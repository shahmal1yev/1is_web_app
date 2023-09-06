<?php

namespace App\Http\Controllers\Back\AdminLogsController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vacancies;
use App\Models\Cv;
use App\Models\Blogs;
use App\Models\Trainings;
use App\Models\Companies;


use Illuminate\Http\Request;
use App\Models\Activity;

class AdminLogsController extends Controller
{
    public function adminCreatedLogs()
    {
        $activityLogs = Activity::with(['causer', 'subject'])
            ->whereEvent('created')
            ->get();

        foreach ($activityLogs as $log) {
            $causerType = $log->causer_type;
            $causerId = $log->causer_id;
            $subjectType = $log->subject_type;
            $subjectId = $log->subject_id;

            $causer = User::find($causerId);

            switch ($subjectType) {
                case CV::class:
                    $subject = CV::find($subjectId);
                    break;
                case Companies::class:
                    $subject = Companies::find($subjectId);
                    break;
                case Vacanies::class:
                    $subject = Vacanies::find($subjectId);
                    break;
                case Blogs::class:
                    $subject = Blogs::find($subjectId);
                    break;
                case Trainings::class:
                    $subject = Trainings::find($subjectId);
                    break;
                default:
                    $subject = null;
                    break;
            }


        }
        return view('back.logs.created', get_defined_vars());

    }

    public function adminUpdatedLogs()
    {
        $activityLogs = Activity::with(['causer', 'subject'])
            ->whereEvent('updated')
            ->whereNotNull('causer_id')
            ->get();


        foreach ($activityLogs as $log) {
            $causerType = $log->causer_type;
            $causerId = $log->causer_id;
            $subjectType = $log->subject_type;
            $subjectId = $log->subject_id;

            $causer = User::find($causerId);

            switch ($subjectType) {
                case CV::class:
                    $subject = CV::find($subjectId);
                    break;
                case Companies::class:
                    $subject = Companies::find($subjectId);
                    break;
                case Vacanies::class:
                    $subject = Vacanies::find($subjectId);
                    break;
                case Blogs::class:
                    $subject = Blogs::find($subjectId);
                    break;
                case Trainings::class:
                    $subject = Trainings::find($subjectId);
                    break;
                default:
                    $subject = null;
                    break;
            }


        }
        return view('back.logs.updated', get_defined_vars());

    }


    public function adminDeletedLogs()
    {
        $activityLogs = Activity::with(['causer', 'subject'])
            ->whereEvent('deleted')
            ->get();

        foreach ($activityLogs as $log) {
            $causerType = $log->causer_type;
            $causerId = $log->causer_id;
            $subjectType = $log->subject_type;
            $subjectId = $log->subject_id;

            $causer = User::find($causerId);

            switch ($subjectType) {
                case CV::class:
                    $subject = CV::find($subjectId);
                    break;
                case Companies::class:
                    $subject = Companies::find($subjectId);
                    break;
                case Vacanies::class:
                    $subject = Vacanies::find($subjectId);
                    break;
                case Blogs::class:
                    $subject = Blogs::find($subjectId);
                    break;
                case Trainings::class:
                    $subject = Trainings::find($subjectId);
                    break;
                default:
                    $subject = null;
                    break;
            }


        }
        return view('back.logs.deleted', get_defined_vars());

    }
}
