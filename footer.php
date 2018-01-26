 <div id="footer" class="container-fluid">
        Copyright @ Avinash kumar sharma avinashs735@gmail.com - +91-8576810694 
    </div>
    <!--End Footer-->

</body>
<!--comment it while going for deployment-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--Uncomment it while going for deployment
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<!--Jquery Code for Sir Modi Jee Animation-->
<script type="text/javascript">
    $(function () {
        $("#pm").animate(
                { "right": "200px" },
                1000,
                function () {
                    $("#pm").animate(
                                { "right": "30px" },
                                500,
                function () {
                    $("#pm").animate(
                                { "right": "170px" },
                                500,
                                function () {
                                    $("#pm").animate({ "right": "0px" }, 500);
                                }
                                )
                }

                        )
                }
        );
    });
</script>
<!--End Jquery Code for Sir Modi Jee Animation-->
</html>                                        