var sub = "";
var subtag = "";

var subid = -1;
var themeid = -1;

var cid = -1;
var tim = -1;
var thumbnail = '';
var tagdiv;

$(function() {
var btn = document.getElementById('upload-btn'),
 wrap = document.getElementById('pic-progress-wrap'),
 picBox = document.getElementById('picbox'),
 errBox = document.getElementById('errormsg');

var uploader = new ss.SimpleUpload({
	button: 'upload-btn', // file upload button
	url: 'php/upload.php', // server side handler
	name: 'uploadfile', // upload parameter name    
	progressUrl: 'extras/uploadProgress.php', // enables cross-browser progress support (more info below)
	responseType: 'json',
	allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
	maxSize: 1024 * 10, // kilobytes
	hoverClass: 'ui-state-hover',
	focusClass: 'ui-state-focus',
	disabledClass: 'ui-state-disabled',
	onSubmit: function(filename, extension) {
		var prog = document.createElement('div'),
		outer = document.createElement('div'),
		bar = document.createElement('div'),
		size = document.createElement('div'),
		self = this;   
			 
		prog.className = 'prog';
		size.className = 'size';
		outer.className = 'progress';
		bar.className = 'bar';

		outer.appendChild(bar);
		prog.appendChild(size);
		prog.appendChild(outer);
		wrap.appendChild(prog); // 'wrap' is an element on the page

		self.setProgressBar(bar);
		self.setProgressContainer(prog);
		self.setFileSizeBox(size);      

		errBox.innerHTML = '';

	},   
	onComplete: function(filename, response) {
		if (!response) {
			alert('Unable to upload file');
		}	   
		if (response.success === true) {
			$("#thumbimg").css("background-image" , "url('uploads/" + encodeURIComponent(response.file) + "')");
			$("#thumbimg").attr("src" , "uploads/" + encodeURIComponent(response.file));
			setimg();
		} else {
			alert('upload file error');
			if (response.msg)  {
				errBox.innerHTML = response.msg;
			} else {
				errBox.innerHTML = 'Unable to upload file';
			}
		}		    
	}
}); 
			 
});



$(function() {
	tagdiv = $('#ftags').tags( {
		tagData: [],
	});
});


//SOME SHIMS
if (!Date.now) {
  Date.now = function() { return new Date().getTime(); }
}

//CODE
function setimg(){
	thumbnail = $("#thumbimg").attr("src");
	
	if (thumbnail == "img/placeholder.png"){
		thumbnail = "none";
	}
	
}

//TOGGLE FOR THE DORPDOWN SUBJECTS
function subdropdown(e){
	sub = $(e).html();
	subtag = $(e).attr("value");
	$("#dropdownMenu1").html(sub);
}

//AJAX POST SCRIPT
function post(){
	var domyjob = true;
	var info = "";
	var title = $("#ftitle").val();
	var desc = $("#fdesc").val();
	var t = tagdiv.getTags();
	var tags = "";
	var content = editor.getValue();
	
	
	for (var i = 0; i< t.length;i++){
		if (i!=0){
			tags = tags + ";" + t[i]; 
		}else{
			tags = t[i]; 
		}
		
	}
	
	
	if (title.length < 3){
		domyjob=false;
		info = info + "Bitte einen Titel eingeben. ";
	}
	
	if (desc.length < 3){
		domyjob=false;
		info = info + "Bitte eine Beschreibung eingeben. ";
	}
	
	if (content.length < 10){
		domyjob=false;
		info = info + "Bitte einen Inhalt eingeben. ";
	}
	

	if (domyjob){
	
		$.ajax({ 
			url: 'php/counter.php' 
			
		}).done(function(msg) {
			
			cid = parseInt(msg);
			tim = new Date().getTime();
			
			if (cid != -1){
		
				$.ajax({ 
					url: 'php/newpost.php',
					dataType: "text",
					type: "POST",
					data: {timestamp: tim, currentid: cid, title: title, desc: desc, tags: tags, subject: subid, thumbnail: thumbnail, content: content, theme: themeid }
						
						
				}).done(function(msg) {
					alert(msg);	
				});

		
			}
		});
		
	} else {//IM NOT DOING MY JOB, PROBABLY AN ERROR
		error("Fehler", info);
	}

}
