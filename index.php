<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Galaxy Pool</title>
  <meta content="GalaxyPool.org - Crypto mining pool" name="description" />
  <meta content="© GalaxyPool.org 2018" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App Icons -->
  <link rel="icon" type="image/png" href="/images/icon.png" />

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">

  <!-- App css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="assets/webfont/webfont.css" rel="stylesheet" type="text/css">
  <link href="assets/plugins/prism/prism.css" rel="stylesheet" type="text/css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/waves.js"></script>
  <script src="assets/js/jquery.slimscroll.js"></script>
  <script src="assets/js/jquery.nicescroll.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

  <!--Morris Chart-->
  <script src="assets/plugins/morris/morris.min.js"></script>
  <script src="assets/plugins/raphael/raphael-min.js"></script>

  <script src="assets/pages/dashborad.js"></script>
  <script src="./js/main.php"></script>

  <!-- App js -->
  <script src="assets/js/app.js"></script>
  <script src="assets/plugins/alertify/js/alertify.js"></script>
  <script src="assets/js/popper.min.js"></script>

</head>


<body>
  <!-- Loader -->
  <div id="preloader">
    <div id="status">
      <div class="spinner"></div>
    </div>
  </div>

  <div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
      <div class="topbar-main">
        <div class="container-fluid">

          <!-- Logo container-->
          <div class="logo">
            <!-- Text Logo -->
            <a href="/" class="logo">GalaxyPool</a>
          </div>
          <!-- End Logo container-->


          <div class="menu-extras topbar-custom">
            <ul class="list-inline float-right mb-0">
              <!-- User-->
              <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" href="./login.php" role="button">
                  <span class="ml-1">Login / SignUp</span>
                </a>
              </li>
              <li class="menu-item list-inline-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                  <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                </a>
                <!-- End mobile menu toggle-->
              </li>
            </ul>
          </div>
          <!-- end menu-extras -->

          <div class="clearfix"></div>

        </div> <!-- end container -->
      </div>
      <!-- end topbar-main -->

      <!-- MENU Start -->
      <div class="navbar-custom">
        <div class="container-fluid">
          <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
              <li class="has-submenu">
                <a href="./"><i class="dripicons-graph-pie"></i>Dashboard</a>
              </li>
              <li class="has-submenu">
                <a href="./?inc=wallets"><i class="dripicons-wallet"></i>Manage wallets</a>
              </li>
              <li class="has-submenu">
                <a href="./?inc=miner"><i class="dripicons-stack"></i>Your workers <span class="badge-primary badge-pill">0</span></a>
              </li>
              <li class="has-submenu">
                <a href="?inc=transactions"><i class="dripicons-list"></i><b>Transactions</b></a>
              </li>
              <li class="has-submenu">
                <a href="?inc=stake"><i class="dripicons-hourglass"></i><b>Stake Pool</b></a>
              </li>
              <li class="has-submenu">
                <a href="./?inc=vps"><i class="dripicons-device-desktop"></i>Buy VPS</a>
              </li>
              <li class="has-submenu">
                <a href="./?inc=pool"><i class="dripicons-information"></i>Pool info</a>
              </li>
              <!-- Telegram
              <li class="has-submenu">
                <a href="https://discord.gg/XAcmgkK"><i class="dripicons-direction"></i><b>Telegram</b></a>
              </li>
              -->
              <li class="has-submenu">
                <a href="https://discord.gg/XAcmgkK" target="_blank"><i class="dripicons-message"></i>Discord</a>
              </li>
            </ul>
            <!-- End navigation menu -->
          </div> <!-- end #navigation -->
        </div> <!-- end container -->
      </div> <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->


  </div>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-xl-4">
          <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
              <h3 class="text-info" id="total_miners">
                <?php
                  $poolURL = array('http://66.42.50.61:8080', 'http://66.42.52.2:8080');
                  $totalMiners = $totalWorker = 0;

                  foreach ($poolURL as $a => $b) {
                    $loginMiner = $minerStats = array('');
                    $minerStats = json_decode(file_get_contents("$b/api/miners"),true);
                    $totalMiners += $minerStats['minersTotal'];

                    $loginMiner = $minerStats['miners'];
                    $totalPoolWorker = 0;
                    foreach($loginMiner as $k=>$v) {
                      $miner = json_decode(file_get_contents("$b/api/accounts/$k"),true);
                      $totalPoolWorker += $miner['workersOnline'];
                    };
                    $totalWorker += $totalPoolWorker;
                  };
                  echo $totalMiners." / ".$totalWorker;
                ?>
              </h3>
              Pool Miners / Workers
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
              <h3 class="text-purple" id="total_hashes">
                <?php
                  $hashrate01 = json_decode(file_get_contents("http://66.42.52.2:8080/api/stats"));
                  $hashrate02 = json_decode(file_get_contents("http://66.42.50.61:8080/api/stats"));
                  $totalhashrate  = ($hashrate01->hashrate + $hashrate02->hashrate) / 1000000000;
                  echo (round($totalhashrate, 2)), (' G/h');
                ?>
              </h3>
              Pool hashrate
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4">
          <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
              <h3 class="text-primary" id="total_coins">5</h3>
              Listed coins
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-md-12 col-xl-12">
          <div class="card text-center m-b-30">
            <div class="mb-2 card-body text-muted">
              <script>
                //Dropdown plugin data
                $(document).ready(function() {

                  updateTable();
                  updateTopMiners();
                  updateLastBlocks();

                  setInterval(updateTable, 5000)
                  setInterval(updateTopMiners, 30000)
                  setInterval(updateLastBlocks, 30000)

                });
              </script>
              <style>
                .hoverDiv {
                  background: #fff;
                }

                .hoverDiv:hover {
                  background: #f5f5f5;
                }
              </style>
              <div id="anon_result">
                <h4 class="mt-0 header-title">Select coin to mine</h4>
                <div class="row text-center m-t-20" style="height: 100%; display: flex; justify-content: center; align-items: center;">
                  <!--
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('vic')">
                    <h5 class=""><img src="/img/vic.png" height="32"/></h5>
                    <p class="text-muted font-14">VIC</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('eth1')">
                    <h5 class=""><img src="/img/eth1.png" height="32"/></h5>
                    <p class="text-muted font-14">ETH1</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('b2g')">
                    <h5 class=""><img src="/img/b2g.png" height="32"/></h5>
                    <p class="text-muted font-14">B2G</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('dogx')">
                    <h5 class=""><img src="/img/dogx.png" height="32"/></h5>
                    <p class="text-muted font-14">DOGX</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('etcc')">
                    <h5 class=""><img src="/img/etcc.png" height="32"/></h5>
                    <p class="text-muted font-14">ETCC</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('egem')">
                    <h5 class=""><img src="/img/egem.png" height="32"/></h5>
                    <p class="text-muted font-14">EGEM</p>
                  </div>
                -->
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('moac')">
                    <h5 class=""><img src="/img/moac.png" height="32"/></h5>
                    <p class="text-muted font-14">MOAC</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('clo')">
                    <h5 class=""><img src="/img/clo.png" height="32"/></h5>
                    <p class="text-muted font-14">CLO</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('rol')">
                    <h5 class=""><img src="/img/rol.png" height="32"/></h5>
                    <p class="text-muted font-14">ROL</p>
                  </div>
                  <!--
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('ubq')">
                    <h5 class=""><img src="/img/ubq.png" height="32"/></h5>
                    <p class="text-muted font-14">UBQ</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('ath')">
                    <h5 class=""><img src="/img/ath.png" height="32"/></h5>
                    <p class="text-muted font-14">ATH</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('mix')">
                    <h5 class=""><img src="/img/mix.png" height="32"/></h5>
                    <p class="text-muted font-14">MIX</p>
                  </div>
                -->
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('dbix')">
                    <h5 class=""><img src="/img/dbix.png" height="32"/></h5>
                    <p class="text-muted font-14">DBIX</p>
                  </div>
                  <div class="col-1 hoverDiv" style="cursor:pointer" onclick="loadMinerForm('prkl')">
                    <h5 class=""><img src="/img/prkl.png" height="32"/></h5>
                    <p class="text-muted font-14">PRKL</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- end row -->

      <div id="anon_miner_stats">

        <div class="row">
          <div class="col-xl-9">
            <div class="card m-b-30">
              <div class="card-body">

                <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#coinlist" role="tab">Coin list</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#lastblocks" role="tab">Last blocks</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#topminers" role="tab">Top miners</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane active p-3" id="coinlist" role="tabpanel">
                    <div class="table-responsive">
                      <table class="table m-t-20 mb-0 table-vertical table-hover">
                        <tbody id="result">
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane p-3" id="lastblocks" role="tabpanel">
                    <div class="table-responsive">
                      <table class="table m-t-20 mb-0 table-vertical table-hover">

                        <tbody id="result_lastblocks">
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane p-3" id="topminers" role="tabpanel">
                    <div class="table-responsive">
                      <table class="table m-t-20 mb-0 table-vertical table-hover">
                        <tbody id="result_topminers">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="card m-b-30">
              <div class="card-body">
                <a class="twitter-timeline" href="https://twitter.com/galaxypool_org?ref_src=twsrc%5Etfw">Tweets by galaxypool_org</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </div>
          </div>
        </div>

        <!-- end row -->
      </div>

    </div> <!-- end container -->
  </div>
  <!-- end wrapper -->


  <!-- Footer -->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          © GalaxyPool.org 2018
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->


  <!-- jQuery  -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125629600-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-125629600-1');
  </script>

  <!-- hit.ua -->
  <a href='http://hit.ua/?x=65879' target='_blank'>
        <script language="javascript" type="text/javascript"><!--
        Cd=document;Cr="&"+Math.random();Cp="&s=1";
        Cd.cookie="b=b";if(Cd.cookie)Cp+="&c=1";
        Cp+="&t="+(new Date()).getTimezoneOffset();
        if(self!=top)Cp+="&f=1";
        //--></script>
        <script language="javascript1.1" type="text/javascript"><!--
        if(navigator.javaEnabled())Cp+="&j=1";
        //--></script>
        <script language="javascript1.2" type="text/javascript"><!--
        if(typeof(screen)!='undefined')Cp+="&w="+screen.width+"&h="+
        screen.height+"&d="+(screen.colorDepth?screen.colorDepth:screen.pixelDepth);
        //--></script>
        <script language="javascript" type="text/javascript"><!--
        Cd.write("<img src='//c.hit.ua/hit?i=65879&g=0&x=2"+Cp+Cr+
        "&r="+escape(Cd.referrer)+"&u="+escape(window.location.href)+
        "' border='0' wi"+"dth='1' he"+"ight='1'/>");
        //--></script>
        <noscript>
        <img src='//c.hit.ua/hit?i=65879&amp;g=0&amp;x=2' border='0'/>
        </noscript></a>
  <!-- / hit.ua -->
  <script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async>
   var crate = new Crate({
      server: '464345908893581313',
      channel: '472463207420788736', //477211466936877097
      shard: 'https://cl1.widgetbot.io'
    });
    crate.notify('Hey there! Come Chat with us');
   </script>
  <script src="/static/js/highcharts.js?v="></script>
</body>

</html>
