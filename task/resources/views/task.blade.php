@extends('app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                   

                    <!-- New Task Form -->
                    <form action="" method="" class="form-horizontal">
                        @csrf

                        <!-- Task Name -->
                        
                        <div class="form-group">
                            <div class="form-group myid">
                                <label for=""></label>
                                <input type="number" name="" id="id" class="form-control" readonly="readonly" >
                            </div>
                            
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control" value="">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="button" onclick="saveData()" id="add" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                                <button type="button" id="update"onclick="updateData()" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Update Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
         
                <div class="panel panel-default">
                    <div class="panel-heading">
                      
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                           <div id="dbody"></div>
                                   
                                    
                               
                            </tbody>
                        </table>
                    </div>
                </div>
           
        </div>
    </div>
@endsection
