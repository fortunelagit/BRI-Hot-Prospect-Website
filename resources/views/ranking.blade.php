<x-app-layout>  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ranking Prospek
        </h2>
    </x-slot>
    
    <!-- component -->
<link rel="preconnect" href="https://rsms.me/">
<link rel="stylesheet" href="https://rsms.me/inter/inter.css">
<style>
    :root { font-family: 'Inter', sans-serif; }
@supports (font-variation-settings: normal) {
  :root { font-family: 'Inter var', sans-serif; }
}
</style>
<body class="antialiased bg-slate-200 text-slate-700">
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow my-10">
        <h1 class="text-2xl font-medium mb-5">Show Rank</h1>
    
        <div class="inline-flex items-center rounded-md shadow-sm">
            <button id="bo-konsolidasi" class="text-slate-800  hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                
                <span>BO Konsolidasi</span>
            </button>
            <button id="bo-only" class="text-slate-800  hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border-y border-slate-200 font-medium px-4 py-2 inline-flex space-x-1 items-center">
                
                <span>BO Only</span>
            </button>
            <button id="sbo-only" class="text-slate-800  text-sm bg-white hover:bg-slate-100 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-200 rounded-r-lg font-medium px-4 py-2 inline-flex space-x-1 items-center">
                
                <span>SBO Only</span>
            </button>
        </div>
    </div>
    
</body>
<div id='bo-konsolidasi-tabel' style="display:none;"><livewire:ranking-potensi :target="$target[0]" ></div>
<div id='bo-only-tabel' style="display:none;"><livewire:ranking-potensi :target="$target[1]" ></div>
<div id='sbo-only-tabel' style="display:none;"><livewire:ranking-potensi :target="$target[2]" ></div>

<script>
  $("button").click(function(){
    $("button").removeClass("bg-slate-100 text-blue-600");
    $(this).addClass("bg-slate-100 text-blue-600");
  });
  $('#bo-konsolidasi').click(function() {
      document.getElementById('bo-only-tabel').style.display = "none";
      document.getElementById('sbo-only-tabel').style.display = "none";
    $('#bo-konsolidasi-tabel').toggle('slow', function() {
      // Animation complete.
    });
  });
  $('#bo-only').click(function() {
      document.getElementById('bo-konsolidasi-tabel').style.display = "none";
      document.getElementById('sbo-only-tabel').style.display = "none";
    $('#bo-only-tabel').toggle('slow', function() {
      // Animation complete.
    });
  });
  $('#sbo-only').click(function() {
      document.getElementById('bo-konsolidasi-tabel').style.display = "none";
      document.getElementById('bo-only-tabel').style.display = "none";
    $('#sbo-only-tabel').toggle('slow', function() {
      // Animation complete.
    });
  });
</script>
</x-app-layout>