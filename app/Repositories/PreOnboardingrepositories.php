<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\CandidatePreOnBoardingModel;
use App\Models\BuddyFeedbackModel;



class PreOnboardingrepositories implements IPreOnboardingrepositories {
     public function Check_onBoard($table,$test)
     {
         $response=DB::table($table)->where($test)->get();
         return $response;
     }
     public function getonBoardingFields($table)
     {
        $response=DB::table($table)->get();
        return $response;
     }
     public function insert_onboard($data)
     {
         $response=CandidatePreOnBoardingModel::insert($data);
         return $response;
     }
     public function update_onboard($data,$id,$field)
     {
         $i=0;
         foreach($data as $onboard)
         {
              $id=$field[$i]->id;
            CandidatePreOnBoardingModel::where('id',$id)->update($onboard);
         $i++;
        }
         $response="success";
         return $response;
     }

   public function insert_buddy_feedback($data)
   {
          $response=BuddyFeedbackModel::insert($data);
            //   $response=DB::table("buddy_feedback_models")->insert($data);
          return $response;
   }
   public function get_buddy_info($id)
   {
        $response=BuddyFeedbackModel::where($id)->get();
        return $response;
   }


}


?>
