<form action="" method="post">
    <script src="jquery.js"></script>
  <script src="bootstrap3-typeahead.min.js"></script>
              <label class="col-sm-2 col-sm-2 control-label">NIK Penduduk</label>
              <div class="col-sm-8">
                <input name="nik" class="form-control" id="nik" type="text" placeholder="NIK" required autocomplete="off" />
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