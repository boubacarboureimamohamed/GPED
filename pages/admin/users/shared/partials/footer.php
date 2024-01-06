  </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../../../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../../../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../../../js/startmin.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../../../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../../../js/dataTables/dataTables.bootstrap.min.js"></script>
        
         <!-- Custom Modals  JavaScript -->
        <script  src="../../../js/modal/index.js"></script>
        <script  src="../../../js/modal/velocity.min.js"></script>
        <script  src="../../../js/modal/velocity.ui.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });

            $('#refresh').on('click', function() {
                location.reload();
            });
        </script> 

    </body>
</html>