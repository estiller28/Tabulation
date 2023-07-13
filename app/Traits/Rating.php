<?php

namespace App\Traits;

use App\Models\Criteria;
use Illuminate\Support\Facades\Auth;

trait Rating {

    public function getAuthUserId(){
        return Auth::user()->id;
    }

    public function enabledCasualWear (){
        $criteria = Criteria::where('name', 'Casual Wear')
            ->where('status', 1)->first();

        if(!$criteria){
            return false;
        }
        return true;
    }

    public function enabledSummerWear (){
        $criteria = Criteria::where('name', 'Summer Wear')
            ->where('status', 1)->first();

        if(!$criteria){
            return false;
        }
        return true;
    }

    public function enabledFilipiñana (){
        $criteria = Criteria::where('name', 'Filipiñana')
            ->where('status', 1)->first();

        if(!$criteria){
            return false;
        }
        return true;
    }

    public function enabledTopFiveQandA (){
        $criteria = Criteria::where('name', 'Top 5 Question and Answer')
            ->where('status', 1)->first();

        if(!$criteria){
            return false;
        }
        return true;
    }

    public function enabledTopThreeQandA (){
        $criteria = Criteria::where('name', 'Top 3 Question and Answer')
            ->where('status', 1)->first();

        if(!$criteria){
            return false;
        }
        return true;
    }
}
