<?PHP
require_once('../lib/connections/db.php');
include('../lib/functions/functions.php');

checkLogin('2');

$getuser = getUserRecords($_SESSION['user_id']);

include('../common/header.php');
?>


        <div class="container">
        
            <div class="done"><H3>New password sent.</H3><p>Check your inbox / junk mail folder for a link to reset your password.</p></div><!--close done-->
            <form class="form-horizontal" id="updatepassForm" action="../server/change_pass_submit.php" method="post">
                <fieldset>
                    <legend>Change Password</legend>
                    <div class="control-group">
                        <label class="control-label" for="oldpassword">Old Password</label>
                            <div class="controls">
                                <input type="password" id="oldpassword" name="oldpassword" placeholder="Old Password" />
                            </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="newpassword">New Password</label>
                            <div class="controls">
                                <input type="password" id="newpassword" name="newpassword" placeholder="New Password" />
                            </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <img id="loading" src="../img/loading.gif" alt="Sending.." />
                        <div id="error">&nbsp;</div>
                        
                    </div>
                </fieldset>
            </form>

           
            <hr/>
            <footer>
                <p>&copy; Company 2012</p>
            </footer>

        </div> <!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/user.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
        <script type="text/javascript" src="../js/core.js"></script>
       
		<script type="text/javascript">
			$(document).ready(function(){
		
				$('#updatepassForm').submit(function(e) {
					updatepass();
					e.preventDefault();	
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



