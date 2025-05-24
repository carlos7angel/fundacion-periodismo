<?php

namespace App\Containers\Monitoring\Denunciation\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\Monitoring\Denunciation\Models\Denunciation;
use App\Containers\Monitoring\Denunciation\Tasks\UpdateDenunciationTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\DB;

class UpdateDenunciationAction extends ParentAction
{
    public function __construct(
        private UpdateDenunciationTask $updateDenunciationTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(Request $request): Denunciation
    {
        $data = $request->sanitizeInput([
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
            $data['aggressor_name'] = null;
            $data['aggressor_organization'] = null;
            $data['aggressor_job_title'] = null;
        }

        if (! $request->has('victim_identified')) {
            $data['victim_anonymous'] = false;
            $data['victim_name'] = $request->get('victim_name') ?? null;
            $data['victim_organization'] = $request->get('victim_organization') ?? null;
        } else {
            $data['victim_anonymous'] = true;
            $data['victim_name'] = null;
            $data['victim_organization'] = null;
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
        } else {
            $data['circumstance_event_other'] = null;
        }

        $data['report_status'] = $request->get('report_status') ?? null;
        if($request->get('report_status') === 'Agresión denunciada formalmente') {
            $data['report_sub_status'] = $request->get('report_sub_status') ?? null;
        } else {
            $data['report_sub_status'] = null;
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
        } else {
            $data['source_information_detail'] = null;
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
        } else {
            $data['links'] = null;
        }

        $violation_type_options = array_column($request->get('kt_violation_typification_options'), 'violation_type_option');
        $denunciation_id = $request->get('denunciation_id');

        return DB::transaction(function () use ($data, $violation_type_options, $denunciation_id) {

            $denunciation = $this->updateDenunciationTask->run($data, $denunciation_id);
            $denunciation->violationTypes()->sync($violation_type_options);
            $denunciation->save();

            return $denunciation;
        });

    }
}
