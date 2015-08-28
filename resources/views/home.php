<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Time Tracker</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    </head>
    <body ng-app="timeTracker" ng-controller="TimeEntry as vm">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">Time Tracker</a>
                </div>
            </div>
            <div class="container-fluid time-entry">
                <div class="timepicker">
                    <span class="timepicker-title label label-primary">Clock In</span>
                    <timepicker ng-model="vm.clockIn" hour-step="1" minute-step="1" show-meridian="true"></timepicker>
                </div>
                <div class="timepicker">
                    <span class="timepicker-title label label-primary">Clock Out</span>
                    <timepicker ng-model="vm.clockOut" hour-step="1" minute-step="1" show-meridian="true"></timepicker>
                </div>
                <div class="time-entry-comment">
                    <form class="navbar-form">
                        <select name="user" class="form-control" ng-model="vm.timeEntryUser" ng-options="user.first_name + ' ' + user.last_name for user in vm.users">
                            <option value="">>-- Select a user --<</option>
                        </select>
                        <input class="form-control" ng-model="vm.comment" placeholder="Enter a comment"></input>
                        <button class="btn btn-primary" ng-click="vm.logNewTime()">Log Time</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="col-sm-8">
                <div class="well timeentry" ng-repeat="time in vm.timeentries">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4>
                                <i class="glyphicon glyphicon-user"></i>
                                {{time.user.first_name}} {{time.user.last_name}}
                            </h4>
                            <p><i class="glyphicon glyphicon-pencil"></i> {{time.comment}}</p>
                        </div>
                        <div class="col-sm-4 time-numbers">
                            <h4>
                                <i class="glyphicon glyphicon-calendar"></i>
                                {{time.end_time | date:'mediumDate'}}
                            </h4>
                            <h2>
                                <span class="label label-primary" ng-show="time.loggedTime.duration._data.hours > 0">
                                    {{time.loggedTime.duration._data.hours}} hour
                                    <span ng-show="time.loggedTime.duration._data.hours > 1">s</span>
                                </span>
                            </h2>
                            <h4>
                                <span class="label label-default">
                                    {{time.loggedTime.duration._data.minutes}} minutes
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="well time-numbers">
                    <h1><i class="glyphicon glyphicon-time"></i> Total Time</h1>
                    <h1><span class="label label-primary">{{vm.totalTime.hours}} hours</span></h1>
                    <h1><span class="label label-default">{{vm.totalTime.minutes}} minutes</span></h1>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="bower_components/angular/angular.js"></script>
        <script type="text/javascript" src="bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
        <script type="text/javascript" src="bower_components/angular-resource/angular-resource.js"></script>
        <script type="text/javascript" src="bower_components/moment/moment.js"></script>

        <script type="text/javascript" src="scripts/app.js"></script>
        <script type="text/javascript" src="scripts/controllers/TimeEntry.js"></script>
        <script type="text/javascript" src="scripts/services/time.js"></script>
        <script type="text/javascript" src="scripts/services/user.js"></script>

    </body>
</html>
