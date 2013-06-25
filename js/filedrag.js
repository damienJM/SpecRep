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