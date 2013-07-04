<?php
    include('common/header.php');

?>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="row">
                    <div class="span4">
                    <h3>Current Projects</h3>
                </div>
                    <div class="span4 offset4">    
                                
                    <a href="#createProject" role="button" class="btn btn-primary" data-toggle="modal">+ New Project</a>
                    </div>
                </div>

                        
            <div class="row">
                <div class="span8 offset2">

                    
                        <table id="filelist" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Project Name</th>
                                    <th>Pending Jobs</th>
                                    <th>Newly Completed Jobs</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>    
                        </table>
                    
                </div>
                <div class="span5">
				<div id="chart" data-spy="affix" align="right">
				</div>
            </div>
            </div>
        </div>
    </div>
            <hr>

           <!--  <footer>
                <p>&copy; Company 2012</p>
            </footer> -->

        </div> <!-- /container -->

        <!-- MODAL FOR NEW PROJECT -->
        <div id="createProject" class="modal hide fade" tabindex="-1" role="dialog" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3>Create a new project</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="newProject" action="server/project_create.php" method="post">
                <fieldset>
                    
                    <div class="control-group">
                        <label class="control-label" for="projectname">Project Name</label>
                            <div class="controls">
                                <input type="text" id="projectname" name="projectname" placeholder="Project Name" />
                            </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="supervisor">Project Supervisor</label>
                            <div class="controls">
                                <input type="text" id="supervisor" name="supervisor" placeholder="Supervisor" /><span class="help-inline">If different from yourself</span>
                            </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-group" for="epsrcfunded">Is this project funded by the EPSRC?</label>
                            <div class="controls">
                                <input type="radio" id="epsrcfunded" name="epsrcfunded" value="yes" checked /> Yes
                                <input type="radio" id="epsrcfunded" name="epsrcfunded" value="no" /> No
                            </div>
                    </div>
                    <div class="control-group">
                        <label class="control-group" for="casesupport">If Yes, was the use of EPR spectroscopy in the case for support?</label>
                            <div class="controls">
                                <input type="radio" id="casesupport" name="casesupport" value="yes" checked /> Yes
                                <input type="radio" id="casesupport" name="casesupport" value="no" /> No
                            </div>
                    </div>

                    

                    <div class="control-group">
                        <label class="control-label" for="category">Which category best describes this project?</label>
                            <div class="controls">
                                <select id="category" name="category">
                                    <option>EPSRC grant with EPR</option>
                                    <option>EPSRC Contract</option>
                                    <option>EPSRC grant without EPR</option>
                                    <option>Pilot study for EPSRC application</option>
                                    <option>Non-EPSRC peer reviewed with EPR</option>
                                    <option>Non-EPSRC peer reviewed without EPR</option>
                                    <option>Institutes and trusts</option>
                                    <option>Pilot study for non-EPSRC applications</option>
                                    <option>Industrial (Non-EPSRC supported)</option>
                                    <option>Other (Detail below)</option>
                                </select>
                            </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="description">Please briefly describe the purpose of the study</label>
                            <div class="controls">
                                <textarea id="description" name="description" rows="3"></textarea>
                            </div>
                    </div>
                    <div id="error">&nbsp;</div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" >Create Project</button>
                        <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                        <img id="loading" src="img/loading.gif" alt="working.." />
                    </div>
                </fieldset>
            </form>
            </div>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
        <script type="text/javascript" src="js/core.js"></script>
		
        <script type="text/javascript">
            
            window.onload = function(){
               //getProjects();
                
            }
            $(document).ready(function(){
    
            $('#newProject').submit(function(e) {
                //createProject();
                e.preventDefault();
                return false; 
            }); 
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
