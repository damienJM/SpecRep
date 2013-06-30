(function(){

 //total number of files to be uploaded
 var totalFiles = 0;
 var uploadedFiles = 0;   
// getElementById
function $id (id) {
    return document.getElementById(id);
}

// output information
function Output (msg) {
    var m = $id("messages");
    m.innerHTML = msg + m.innerHTML;
}

// file drag hover
function FileDragHover (e) {
    e.stopPropagation();
    e.preventDefault();
    e.target.className = (e.type == "dragover" ? "hover" : "");
}

// file selection
function FileSelectHandler (e) {
    //cancel event and hover styling
    FileDragHover(e);
    //fetch FileList object
    var files = e.target.files || e.dataTransfer.files;
    totalFiles = files.length;
   
    //process all file objects
    for (var i = 0,f; f = files[i]; i++) {
       // ParseFile(f);
        UploadFile(f);
    }
    
}
//total progress bar
function progressBar (i) {
    var progress = document.getElementsByClassName("bar")[0];
    
    if(i=="0"){
        $('.progress .bar').css('width', '0%');
    }

    var pc = parseInt((i / totalFiles*100));
    
    $('.progress .bar').css('width', pc + '%');

    if(i==totalFiles){
        i=0;
        totalFiles = 0;
        uploadedFiles = 0;
    }
        
    
}
// parse files to diplay
function ParseFile (file) {
    var type, ext = file.name.split('.').pop();
    if(ext == 'epr'){
        type = "Spectra data";
    }
    if(ext == "param"){
        type = "Parameter data";
    }
    Output(
            "<p>File information: <strong>" + file.name +
            "</strong> type: <strong>" + type +
            "</strong> size: <strong>" + file.size +
            "</strong> bytes</p>"
        );
}

//upload file asynchronously
function UploadFile (file) {
    var xhr;
    var ext = file.name.split('.').pop();
     if(window.XMLHttpRequest)
     {
        //under IE7+, chrome, FF, opera, safari
        xhr = new XMLHttpRequest();
     }
     else{
        //IE6/5
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
     }

     if(xhr.upload){
        //create progress bar
        var o = $id("messages");
        var message = o.appendChild(document.createElement("p"));
        message.id=file.name;
        message.appendChild(document.createTextNode(file.name));
        //progress bar
        xhr.upload.addEventListener("progress",function(e){
            //var pc = parseInt(100 - (e.loaded / e.total*100));
            //progress.style.backgroundPosition = pc + "% 0";
        },false);
        //file received/failed
        xhr.onreadystatechange = function(e){
            if(xhr.readyState == 4 && xhr.status == 200){
                console.log(xhr.responseText);
                if(xhr.responseText == "exists"){
                    message.className = "failure";
                    message.appendChild(document.createTextNode("file already in database"));
                }
                else{
                    message.className = "success";
                    var bar = document.getElementById(file.name);
                    var temp = o.removeChild(bar);
                    uploadedFiles++;
                    progressBar(uploadedFiles);
                   
                }
                
            }
            else{
                message.className = "failure";
            }
        };
        //start upload
        //get data
        var form = $id('fileupload');
        var data = new FormData(form);
        //console.log(form);
        data.append('file',file);
        //console.log(otherData);
        //post data to server
        xhr.open("POST", "server/upload_file.php", true);
        xhr.setRequestHeader("X_FILENAME",file.name);
        xhr.send(data);
        
     }
    
}

//initialize
function Init () {
    
    var fileselect = $id("fileselect"),
        filedrag = $id("filedrag"),
        submitbutton = $id("submitbutton");
    //process the file if the user uses the choose files button rather than drag drop
    fileselect.addEventListener("change", FileSelectHandler, false);
    //is XHR2 available?
    
    filedrag.style.display = "block";
    var xhr = new XMLHttpRequest();
    if(xhr.upload){
        //file drop
        filedrag.addEventListener("dragover", FileDragHover, false);
        filedrag.addEventListener("dragleave", FileDragHover, false);
        filedrag.addEventListener("drop", FileSelectHandler, false);
        //submitbutton.addEventListener("click", UploadFile, false);
        //remove submit button
        submitbutton.style.display="none";
        //var q = $id("total_progress");
        //var progress = q.appendChild(document.createElement("p"));
        
    }
}

 //call init for file upload file
if(window.File && window.FileList && window.FileReader){
   Init();
   
}
})();