<?php

namespace Renatio\FormBuilder\Utilities;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Renatio\FormBuilder\Models\Field;
use BusyRoomsCMS\Settings\Models\ClientSettings;

/**
 * Class FieldValue
 * @package Renatio\FormBuilder\Utilities
 */
class FieldValue
{

    /**
     * @param Field $field
     * @return \Illuminate\Routing\Route|mixed|string
     */
    public function get(Field $field)
    {
        $value = post($field->name);

        if ($field->field_type->code == 'country_select' && post($field->name)) {
            $value = $this->getCountryById(post($field->name))->name;
        }

        if ($field->field_type->code == 'state_select' && post($field->name)) {
            $value = $this->getStateById(post($field->name))->name;
        }

        if ($field->field_type->code == 'date_picker' && $value) {
            if (strtotime($value) !== false) {
                $dateTime = Carbon::parse($value);

                if (App::isLocale('de')) {
                    $value = $dateTime->format('d.m.Y');
                } else {
                    $value = $dateTime->format('Y/m/d');
                }
            }
        }

        if ($field->field_type->code == 'time_picker' && $value) {
            if (strtotime($value) !== false) {
                $dateTime = Carbon::parse($value);

                if (App::isLocale('de') || ClientSettings::get('suppress_am_pm')) {
                    $value = $dateTime->format('H:i');
                } else {
                    $value = $dateTime->format('h:i a');
                }
            }
        }

        if ($field->field_type->code == 'date_time_picker' && $value) {
            if (strtotime($value) !== false) {
                $dateTime = Carbon::parse($value);

                if (App::isLocale('de')) {
                    $value = $dateTime->format('d.m.Y H:i');
                } else {
                    if (ClientSettings::get('suppress_am_pm')) {
                        $value = $dateTime->format('Y/m/d H:i');
                    } else {
                        $value = $dateTime->format('Y/m/d h:i a');
                    }
                }
            }
        }

        return is_array($value) ? implode(', ', $value) : $value;
    }

    /**
     * @param $countryId
     * @return mixed
     */
    protected function getCountryById($countryId)
    {
        if (class_exists('RainLab\Location\Models\Country')) {
            return \RainLab\Location\Models\Country::findOrFail($countryId);
        }
    }

    /**
     * @param $stateId
     * @return mixed
     */
    protected function getStateById($stateId)
    {
        if (class_exists('RainLab\Location\Models\State')) {
            return \RainLab\Location\Models\State::findOrFail($stateId);
        }
    }

}
