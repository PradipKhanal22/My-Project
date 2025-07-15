@if(Session::has('success'))
<div class="fixed right-4 bottom-4 bg-indigo-50 px-7 py-3 rounded-lg
shadow-lg border-l-8 border-indigo-600 z-[999]" id="alertmessage">
    <p class="text-indigo-600 text-center text-xl font-bold "><i class="fa-solid fa-check-double"></i> {{session('success')}}</p>
</div>
<script>
    setTimeout(function() {
        document.getElementById('alertmessage').style.display='none';
    },2000);
</script>
@endif




@if(Session::has('error'))
<div class="fixed right-4 bottom-4 bg-red-50 px-7 py-3 rounded-lg
shadow-lg border-l-8 border-red-600 z-20" id="alertmessage">
    <p class="text-red-600 text-center text-xl font-bold "><i class="fa-solid fa-circle-xmark"></i> {{session('error')}}</p>
</div>
<script>
    setTimeout(function() {
        document.getElementById('alertmessage').style.display='none';
    },2000);
</script>
@endif
