<?php
	session_start();
	if (!isset($_SESSION["adminusername"]))
	{
		header("Location: adminLogin.php");
	}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin | Job Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="admin" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ng-table/0.8.3/ng-table.min.css" />
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <style>
        .noCap {
            text-transform: none;
        }

        md-card md-card-title md-card-title-media .md-media-xs {
            height: 40px;
            width: 40px
        }

        .padding-top-bottom-5px {
            padding-top: 5px !important;
            padding-bottom: 5px !important;
        }

        md-content.md-default-theme,
        md-content {
            background-color: rgb(255, 255, 255) !important;
        }

        md-sidenav,
        md-sidenav.md-locked-open,
        md-sidenav.md-closed.md-locked-open-add-active {
            min-width: 280px !important;
            width: 50vw !important;
            max-width: 280px !important;
        }

        md-card md-card-title md-card-title-text {
            text-align: left;
            padding-left: 15px;
        }

        md-card.md-default-theme,
        md-card {
            height: calc(100vh - 75px);
            overflow: auto;
            width: 260px;
            padding-bottom: 30px;
        }

        .md-title {
            font-size: 12px;
            font-weight: 500;
            letter-spacing: .005em;
        }

        .md-headline {
            font-size: 16px;
            font-weight: 400;
            line-height: 26px;
        }
    </style>
</head>

<body ng-app="adminModule" ng-controller="mainCtrl">
    <section layout="row" flex>

        <md-sidenav layout="column" style="height:100vh;" class="md-sidenav-left flex" md-component-id="left" md-is-locked-open="$mdMedia('gt-md')" md-whiteframe="4">
            <md-toolbar class="md-theme-indigo" style="flex-direction: row;">
                <span style="flex-grow: 7">
                    <h1 class="md-toolbar-tools">List of options</h1>
                </span>
                <span ng-click="closeLeft()" hide-gt-md style="flex-grow: 3">
                    <h1 class="md-toolbar-tools">close</h1>
                </span>
            </md-toolbar>

            <div flex-xs flex-gt-xs="100" layout="column">
                <md-card md-theme="default" md-theme-watch>
                    <md-button href="#!/" ng-click="closeLeft()">
                        <md-card-title class="padding-top-bottom-5px">
                            <md-card-title-media style="margin-top: 0px !important;">
                                <div class="md-media-xs card-media" style="border-radius: 50px;">
                                    <span class="glyphicon glyphicon-equalizer md-headline"></span>
                                </div>
                            </md-card-title-media>
                            <md-card-title-text>
                                <span class="md-title noCap">Dashboard</span>
                            </md-card-title-text>
                        </md-card-title>
                    </md-button>
                    <md-button href="#!addEmp" ng-click="closeLeft()">
                        <md-card-title class="padding-top-bottom-5px">
                            <md-card-title-media style="margin-top: 0px !important;">
                                <div class="md-media-xs card-media" style="border-radius: 50px;">
                                    <span class="glyphicon glyphicon-plus md-headline"></span>
                                </div>
                            </md-card-title-media>
                            <md-card-title-text>
                                <span class="md-title noCap">Add New Employer</span>
                            </md-card-title-text>
                        </md-card-title>
                    </md-button>
                    <md-button href="#!manageEmp" ng-click="closeLeft()">
                        <md-card-title class="padding-top-bottom-5px">
                            <md-card-title-media style="margin-top: 0px !important;">
                                <div class="md-media-xs card-media" style="border-radius: 50px;">
                                    <span class="glyphicon glyphicon-file md-headline"></span>
                                </div>
                            </md-card-title-media>
                            <md-card-title-text>
                                <span class="md-title noCap">Manage Employer</span>
                            </md-card-title-text>
                        </md-card-title>
                    </md-button>
                  <!--
                    <md-button href="#!listCandidate" ng-click="closeLeft()">
                        <md-card-title class="padding-top-bottom-5px">
                            <md-card-title-media style="margin-top: 0px !important;">
                                <div class="md-media-xs card-media" style="border-radius: 50px;">
                                    <span class="glyphicon glyphicon-list-alt md-headline"></span>
                                </div>
                            </md-card-title-media>
                            <md-card-title-text>
                                <span class="md-title noCap">JobSeekers List</span>
                            </md-card-title-text>
                        </md-card-title>
                    </md-button>
-->
                    <md-button href="#!valuesEmp" ng-click="closeLeft()">
                        <md-card-title class="padding-top-bottom-5px">
                            <md-card-title-media style="margin-top: 0px !important;">
                                <div class="md-media-xs card-media" style="border-radius: 50px;">
                                    <span class="glyphicon glyphicon-list-alt md-headline"></span>
                                </div>
                            </md-card-title-media>
                            <md-card-title-text>
                                <span class="md-title noCap">Employer values</span>
                            </md-card-title-text>
                        </md-card-title>
                    </md-button>
                  <!--
                    <md-button href="#!listJobs" ng-click="closeLeft()">
                        <md-card-title class="padding-top-bottom-5px">
                            <md-card-title-media style="margin-top: 0px !important;">
                                <div class="md-media-xs card-media" style="border-radius: 50px;">
                                    <span class="glyphicon glyphicon-tasks md-headline"></span>
                                </div>
                            </md-card-title-media>
                            <md-card-title-text>
                                <span class="md-title noCap">View/Delete Posted Jobs</span>
                            </md-card-title-text>
                        </md-card-title>
                    </md-button>
-->
                    <md-button href="#!loginAs" ng-click="closeLeft()">
                        <md-card-title class="padding-top-bottom-5px">
                            <md-card-title-media style="margin-top: 0px !important;">
                                <div class="md-media-xs card-media" style="border-radius: 50px;">
                                    <span class="glyphicon glyphicon-tasks md-headline"></span>
                                </div>
                            </md-card-title-media>
                            <md-card-title-text>
                                <span class="md-title noCap">Login As</span>
                            </md-card-title-text>
                        </md-card-title>
                    </md-button>
									</md-card>
            </div>
        </md-sidenav>

        <md-content flex>
            <md-toolbar class="md-hue-2">
                <div class="md-toolbar-tools">
                    <md-button ng-click="toggleLeft()" aria-label="Settings" ng-disabled="false" class="md-icon-button"
                        show-md hide-gt-md>
                        <md-icon class="glyphicon glyphicon-menu-hamburger" style="margin-top: 5px;"></md-icon>
                    </md-button>
                    <h2 flex md-truncate>Admin Panel</h2>
                    <md-button href="logout.php" class="md-icon-button" aria-label="More">
                        <md-icon class="glyphicon glyphicon-log-out"></md-icon>
                    </md-button>
                </div>
            </md-toolbar>
            <div layout="column" layout-padding>
                <div ng-view></div>
            </div>
            <div flex></div>
        </md-content>
    </section>
    </div>
    <?php include('footer.php'); ?>
  
  
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs//1.6.4/angular-animate.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-aria.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-messages.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-table/0.8.3/ng-table.min.js"></script> 
	<script src="js/mainCtrl.js"></script>
</body>
</html> 
