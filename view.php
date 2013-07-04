<?php
    include('common/header.php');

?>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h3>List files:</h3>
                        <form class="form-inline">

                            <label>Data type</label>
                                <select id="file_type" name="file_type">
                                    <option>All</option>
                                    <option>EPR Data</option>
                                    <option>Magnetisation Data</option>
                                    <option>Susceptibility Data</option>
                                </select>
                                 <select id="data_type" name="file_type">
                                    <option>All</option>
                                    <option>Simulated</option>
                                    <option>Experimental</option> 
                                </select>
                                
                                <button type="submit" class="btn btn-primary" id="filter">Filter</button>
                                <button type="button" class="btn" id="clear_filter">Clear Filter</button>
                                

                        </form>
                        <!-- <form class="form-search">
                            <div class="input-append offset1">
                                <input type="text" class="span2 search-query" id="searchbox"/>
                                <button type="submit" class="btn" id="search">Search</button>
                            </div>
                                

                        </form>  -->
            <div class="row">
                <div class="span7">

                    
                        <table id="filelist" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Filename</th>
                                    <th>System</th>
                                    <th>Data type</th>
                                    <th>File type</th>
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
                var data = new Array();
                //load filenames from db
                getFileNames();
                $('#filter').click(function(){

                    data['data_type'] = $('#data_type').val();
                     data['file_type'] = $('#file_type').val();
                     data['search'] = "";
                     console.log(data);
                     getFileNames(data);
                     return false;
                });
                $('button#clear_filter').click(function(){
                    console.log('clear');
                    getFileNames();
                    $('select#data_type').val(0);
                    $('select#file_type').val(0);
                    return false;
                });
                // $('button#search').click(function(){
                //      data['data_type'] = $('#data_type').val();
                //      data['file_type'] = $('#file_type').val();
                //      data['search'] = $('#searchbox').val();
                //      getFileNames(data);
                //     $('#searchbox').val('');
                //     return false;
                // });
                
            }
        </script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
