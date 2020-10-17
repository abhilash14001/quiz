
$(document).ready(function(){
var timeBegan = null
    , timeStopped = null
    , stoppedDuration = 0
    , started = null;
      timeBegan = 0;
  var qid = $('#qid').val();
  var eid = $('#eid').val();

  
     stoppedDuration += (new Date() - timeStopped);
		
    console.log(stoppedDuration);

    started = setInterval(clockRunning, 10);	


function clockRunning(){
    var currentTime = new Date()
        , timeElapsed = new Date(currentTime - timeBegan - stoppedDuration)
        , hour = timeElapsed.getUTCHours()
        , min = timeElapsed.getUTCMinutes()
        , sec = timeElapsed.getUTCSeconds()
        , ms = timeElapsed.getUTCMilliseconds();

    document.getElementById("countup").innerHTML = 
        (sec > 9 ? sec : "0" + sec) + "." + 
        (ms > 99 ? ms : ms > 9 ? "0" + ms : "00" + ms);
var levelMaxTime = $('#pec').val();
var timeSpent =   sec + "." + ms;
var levelScore = 100; 
scores = Math.max(0, levelMaxTime - timeSpent) * levelScore;

$.ajax({
	url:"time_taken.php",
	data:{s:sec, ms:ms, qid:qid, eid:eid, scores:scores},
	dataType:"html",
	type:"POST",
});		

};
 });


