<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Tcl{
   /**
     * Begin DB transaction.
     */
    public function beginTransaction():void
    {
        DB::beginTransaction();
    }

    /**
     * DB transaction rollback.
     */
    public function rollback():void
    {
        DB::rollback();
    }

    /**
     * DB transaction commit.
     */
    public function commit():void
    {
        DB::commit();
    }

    public function softDelete($model):void
    {
        $now =Carbon::now();
        $now = $now->toDateTimeString();
        $model->update(
            [
            "id"=>$model->id,
            "deleted_at"=>$now,
            ]
        );
    }

}