<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Containers\Monitoring\Denunciation\Tasks\CreateDenunciationStatusActivityTask;
use App\Containers\Monitoring\Denunciation\Tasks\CreateDenunciationTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateDenunciationAction extends ParentAction
{
    public function __construct(
        private CreateDenunciationTask $createDenunciationTask,
        private CreateDenunciationStatusActivityTask $createDenunciationStatusActivityTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(Request $request): Denunciation
    {
        $sanitizedData = $request->sanitizeInput([
            // add your request data here
        ]);

        $data['aggressor_type'] = $request->get('aggressor_type') ?? null;
        $data['aggressor_subtype'] = $request->get('aggressor_subtype') ?? null;

        if (! $request->has('aggressor_identified')) {
            $data['aggressor_identified'] = true;
            $data['aggressor_name'] = $request->get('aggressor_name') ?? null;
            $data['aggressor_organization'] = $request->get('aggressor_organization') ?? null;
            $data['aggressor_job_title'] = $request->get('aggressor_job_title') ?? null;
        } else {
            $data['aggressor_identified'] = false;
        }

        if (! $request->has('victim_identified')) {
            $data['victim_anonymous'] = false;
            $data['victim_name'] = $request->get('victim_name') ?? null;
            $data['victim_organization'] = $request->get('victim_organization') ?? null;
        } else {
            $data['victim_anonymous'] = true;
        }

        $data['victim_type'] = $request->get('victim_type') ?? null;
        $data['victim_gender'] = $request->get('victim_gender') ?? null;
        $data['victim_age_group'] = $request->get('victim_age_group') ?? null;

        $data['date_event'] = $request->get('date_event') ?? null;
        $data['state'] = $request->get('state') ?? null;
        $data['province'] = $request->get('province') ?? null;
        $data['region'] = $request->get('region') ?? null;
        $data['city'] = $request->get('city') ?? null;

        $data['description_event'] = $request->get('description_event') ?? null;
        $data['circumstance_event'] = $request->get('circumstance_event') ?? null;

        if($request->get('circumstance_event') === 'Otro') {
            $data['circumstance_event_other'] = $request->get('circumstance_event_other') ?? null;
        }

        $data['report_status'] = $request->get('report_status') ?? null;
        if($request->get('report_status') === 'Agresión denunciada formalmente') {
            $data['report_sub_status'] = $request->get('report_sub_status') ?? null;
        }

        $data['action_response_state'] = $request->get('action_response_state') ?? null;
        $data['action_unprotect_state'] = $request->get('action_unprotect_state') ?? null;
        $data['action_journalistic_unions'] = $request->get('action_journalistic_unions') ?? null;
        $data['action_organization_society'] = $request->get('action_organization_society') ?? null;
        $data['source_information'] = $request->get('source_information') ?? null;

        if(
            $request->get('source_information') === 'Organización de la Sociedad Civil' ||
            $request->get('source_information') === 'Gremio periodístico' ||
            $request->get('source_information') === 'Publicación /nota de prensa'
        ) {
            $data['source_information_detail'] = $request->get('source_information_detail') ?? null;
        }

        if ($request->has('kt_links_options')) {
            $data['links'] = null;
            $links = [];
            $links_array =  $request->get('kt_links_options');
            foreach ($links_array as $key => $link_item) {
                if (! empty($link_item['links_value'])) {
                    $links[] = $link_item['links_value'];
                }
            }
            if (count($links) > 0) {
                $data['links'] = json_encode($links);
            }
        }

        //dd($data);

        $user = app(GetAuthenticatedUserTask::class)->run();
        $data['created_by'] = $user->id;

        $violation_type_options = array_column($request->get('kt_violation_typification_options'), 'violation_type_option');

        return DB::transaction(function () use ($data, $violation_type_options) {

            $denunciation = $this->createDenunciationTask->run($data);
            $denunciation->violationTypes()->sync($violation_type_options);
            $denunciation->status = 'NEW';
            $denunciation->code = '' . strtoupper(substr(
                    hash("sha512", Carbon::now()->timestamp . $denunciation->id . Str::random(24)), 0, 6
                )) . '/' . Carbon::now()->format('y');
            $denunciation->save();

            $activity = $this->createDenunciationStatusActivityTask->run([
                'fid_denunciation' => $denunciation->id,
                'status' => 'NEW',
                'previous_status' => '',
                'registered_by' => $data['created_by'],
                'observations' => '',
                'registered_at' => Carbon::now()->toDateTimeString()
            ]);

            return $denunciation;
        });

    }
}
