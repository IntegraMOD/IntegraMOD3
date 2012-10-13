
/************************************************************************************************************
(C) www.dhtmlgoodies.com, November 2005

************************************************************************************************************/

var imshowhide_slideSpeed = 10;	// Higher value = faster
var imshowhide_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var imshowhide_activeId = false;
var imshowhide_slideInProgress = false;
function showHideContent(e,inputId)
{
	if(imshowhide_slideInProgress)return;
	imshowhide_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('imshowhide_a' + numericId);

	objectIdToSlideDown = false;
	
	if(!answerDiv.style.display || answerDiv.style.display=='none'){		
		if(imshowhide_activeId &&  imshowhide_activeId!=numericId){			
			objectIdToSlideDown = numericId;
			slideContent(imshowhide_activeId,(imshowhide_slideSpeed*-1));
		}else{
			
			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';
			
			slideContent(numericId,imshowhide_slideSpeed);
		}
	}else{
		slideContent(numericId,(imshowhide_slideSpeed*-1));
		imshowhide_activeId = false;
	}	
}

function slideContent(inputId,direction)
{
	
	var obj =document.getElementById('imshowhide_a' + inputId);
	var contentObj = document.getElementById('imshowhide_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',imshowhide_timer);
	}else{
		if(height<=1){
			obj.style.display='none'; 
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('imshowhide_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('imshowhide_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,imshowhide_slideSpeed);				
			}else{
				imshowhide_slideInProgress = false;
			}
		}else{
			imshowhide_activeId = inputId;
			imshowhide_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='imshowhide_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'imshowhide_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'imshowhide_a'+divCounter;	
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px'; 	
			contentDiv.className='imshowhide_answer_content';
			contentDiv.id = 'imshowhide_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}		
	}	
}
window.onload = initShowHideDivs;
