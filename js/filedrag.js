(function(){
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
    //process all file objects
    for (var i = 0,f; f = files[i]; i++) {
        ParseFile(f);
        UploadFile(f);
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
        var o = $id("progress");
        var progress = o.appendChild(document.createElement("p"));
        progress.appendChild(document.createTextNode("upload" + file.name));

        //progress bar
        xhr.upload.addEventListener("progress",function(e){
            var pc = parseInt(100 - (e.loaded / e.total*100));
            progress.style.backgroundPosition = pc + "% 0";
        },false);
        //file received/failed
        xhr.onreadystatechange = function(e){
            if(xhr.readyState == 4 && xhr.status == 200){
                if(xhr.responseText == "exists"){
                    progress.className = "failure";
                    progress.appendChild(document.createTextNode("file already in database"));
                }
                else{
                    progress.className = "success";
                }
                
            }
            else{
                progress.className = "failure";
            }
        };
        //start upload
        var data = new FormData();
        data.append('file',file);
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
        
        //remove submit button
        submitbutton.style.display="none";
    }
}

 //call init for file upload file
if(window.File && window.FileList && window.FileReader){
   Init();
   
}
})();