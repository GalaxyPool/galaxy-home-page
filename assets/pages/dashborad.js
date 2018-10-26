function updateTable(){
jQuery.post("./ajax/", {action:'calculate'},function(data){$("#result").html(data);});
}
function updateTopMiners(){
jQuery.post("./ajax/", {action:'topminers'},function(data){$("#result_topminers").html(data);});
}
function updateLastBlocks(){
jQuery.post("./ajax/", {action:'lastblocks'},function(data){$("#result_lastblocks").html(data);});
}
function account(){
  var address=$("#address").val();
  var ticker=$("#ticker").val();
jQuery.post("./ajax/account.php", {action:'account',address:address,ticker:ticker},function(data){$("#account").html(data);});
}




function showWallet(coin){
jQuery.post("./ajax/show.php", {action:'showWallet',coin:coin},function(data){$("#wallets").html(data);});
}
function showStats(wallet){
jQuery.post("./ajax/show.php", {action:'showStats',wallet:wallet},function(data){$("#wallets").html(data);});
}
function showActiveAddress(status){
jQuery.post("./ajax/show.php", {action:'showActiveAddress',status:status},function(data){$("#"+status).html(data);});
}
function showMinerConfig(id){
jQuery.post("./ajax/show.php", {action:'showMinerConfig',id:id},function(data){$("#wallets").html(data);});
}
function showPoolStats(coin){
jQuery.post("./ajax/show.php", {action:'showPoolStats',coin:coin},function(data){$("#pool").html(data);});
}
function loadMinerForm(coin){
jQuery.post("./ajax/anon.php", {action:'loadMinerForm',coin:coin},function(data){$("#anon_result").html(data);});
}
function showAnonMiner(coin){
  var address=$("#anon_address").val();
jQuery.post("./ajax/anon.php", {action:'showAnonMiner',address:address,coin:coin},function(data){$("#anon_miner_stats").html(data);});
}

function addWallet(coin){
  var label=$("#label").val();
  var address=$("#address").val();
jQuery.post("./ajax/action.php", {action:'addWallet',coin:coin,address:address,label:label},function(data){$("#status_result").html(data);});
}


function downloadBatFile(id) {
    var text=$("#textarea"+id).val();
    var filename='TerraHashStart.bat';
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}
