<?php

namespace App\Http\Traits;
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

    public function delete()
    {
        
    }

}