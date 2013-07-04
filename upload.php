<?php
    include('common/header.php');

?>

        <div class="container">
        <div class="row">
            <div class="span12">
            <div class="row">
                <div class="span3">
            <form enctype="multipart/form-data" id="fileupload" action="server/upload_file.php"> 
                <fieldset>
                    <legend>File Upload</legend>
                   <!--  <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="3000000" /> -->
                    <div id="meas_system" >
                    <label>Experimental System</label>
                    <input type="text" placeholder="Cr7Ni, Cr7Mn, etc... " name="system" id="system"/>
                    <span class="help-inline hidden" >Please proved measurement system</span>
                    </div>
                    <label class="radio">
                        <input type="radio" name="optionsRadio" id="expt" value="Experimental" checked="checked">Experimental Data Files</input>
                    </label>
                   
                    <label class="radio">
                        <input type="radio" name="optionsRadio" id="sim" value="Simulated">Simulated Data Files</input>
                    </label>
                    
                    <label>Data type</label>
                        <select id="file_type" name="file_type">
                            <option>EPR Data</option>
                            <option>Magnetisation Data</option>
                            <option>Susceptibility Data</option>
                        </select>
                    <div id="eprExtras">
                        <label>Supplementary EPR information</label>
                            <select id="epr_type" name="epr_type">
                                <option>Q Band</option>
                                <option>W Band</option>
                            </select>
                    </div>
                    <div id="magExtras">
                        <label>Supplementary Infromation</label>
                            <div class="input-append">
                            <input type="text" placeholder="Temperature in K" name="temperature" />
                            <span class="add-on">K</span>
                        </div>
                        <br/>
                        <div class="input-append">
                            <input type="text" placeholder="Field in T" name="magfield" />
                            <span class="add-on">T</span>
                        </div>
                    </div>
                    <div>
                        <label for="fileselect">Files to upload:</label>
                        <input type="file" id="fileselect" class="btn" name="fileselect[]" multiple="multiple" />
                        <div id="filedrag">or drop files here
                           <div id="fileuploadlist"></div>
                        </div>
                    </div>
                
                    <div id="submitbutton" >
                        <button class="btn btn-primary" type="submit">Upload Files</button>
                        <span class='help-inline hidden'>Please select or drag some files to be uploaded</span>
                    </div> 

                </fieldset>     
               <!--  <input type="file" onchange='' name="file" />
                <input type="button" value="upload" id="upload" /> -->
            </form>
        
              
            <div class="progress">
                <div class="bar"></div>

            </div>
            <div id="total"></div>
            </div>
            <div class="span6 offset3">
            <div id="messages">
                <h3>Upload Status</h3>
            </div>
        </div>
    </div>
        </div>    
            <hr>
        </div>
            <footer>
                <p>&copy; Company 2012</p>
            </footer>

        </div> <!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
       
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
        </script>
         
        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/filedrag.js"></script>
        <script type="text/javascript">

            $('#file_type').change(function(){
                var epr = $('#eprExtras');
                var mag = $('#magExtras');
                var dataType = $('#file_type').val();
                if(dataType == 'Magnetisation Data' || 'Susceptibility Data'){
                    $('#eprExtras').css('display','none');
                    $('#magExtras').css('display','block');
                }
                if(dataType == 'EPR Data'){
                    $('#eprExtras').css('display','block');
                    $('#magExtras').css('display','none');
                }

                
            });
            

        </script>
       
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    
    </body>
</html>
