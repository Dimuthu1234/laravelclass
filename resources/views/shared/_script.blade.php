<!-- jQuery Plugins -->
<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>

<script>
var dropDownValue = document.getElementById("dropDown");

// dropDownValue.onchange = function() {
//   if (this.selectedIndex !== 0) {
//     window.location.href = this.value;
//   }
// };
</script>

@stack('scripts')