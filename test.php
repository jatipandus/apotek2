<div style="margin-bottom:15px;" align="right">
  <form action="" method="post" class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">
    <script src="jquery.js"></script>
  <script src="bootstrap3-typeahead.min.js"></script>
              <label class="col-sm-2 col-sm-2 control-label">NIK Penduduk</label>
              <div class="col-sm-8">
                <input name="nik" class="form-control" id="nik" type="text" placeholder="nik" required />
              </div>
         <script>
$('input.typeahead').typeahead({
  source:  function (query, process) {
  return $.get('data_penduduk.php', { query: query }, function (data) {
      console.log(data);
      data = $.parseJSON(data);
      return process(data);
    });
  }
});
</script>

  </form>
 </div>