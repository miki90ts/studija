<form method="GET" action="{{route('search.index')}}" class="nav-search-form is-flex m-0 align-self-center">
    <svg viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="is-hidden-mobile" style="width: 30px;"><title>search</title> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="search-icon" fill="#cacaca"><path d="M11.1921711,12.6063847 C10.0235906,13.4815965 8.5723351,14 7,14 C3.13400675,14 0,10.8659932 0,7 C0,3.13400675 3.13400675,0 7,0 C10.8659932,0 14,3.13400675 14,7 C14,8.5723351 13.4815965,10.0235906 12.6063847,11.1921711 L14.0162265,12.6020129 C14.6819842,12.4223519 15.4217116,12.5932845 15.9484049,13.1199778 L18.7795171,15.95109 C19.5598243,16.7313971 19.5646685,17.9916807 18.7781746,18.7781746 C17.997126,19.5592232 16.736965,19.5653921 15.95109,18.7795171 L13.1199778,15.9484049 C12.5960188,15.4244459 12.4217025,14.6840739 12.6018353,14.0160489 L11.1921711,12.6063847 Z M7,12 C9.76142375,12 12,9.76142375 12,7 C12,4.23857625 9.76142375,2 7,2 C4.23857625,2 2,4.23857625 2,7 C2,9.76142375 4.23857625,12 7,12 Z"></path></g></g></svg>
    <span class="algolia-autocomplete" style="position: relative; display: inline-block; direction: ltr;"><input class="input aa-hint" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: rgb(255, 255, 255) none repeat scroll 0% 0%;" readonly="" aria-hidden="true" autocomplete="off" spellcheck="false" tabindex="-1" type="search">
    <span class="algolia-autocomplete" style="position: relative; display: inline-block; direction: ltr;"><input class="input aa-input aa-hint" autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="both" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" style="vertical-align: top; background: transparent none repeat scroll 0px 0px; position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1;" dir="auto" readonly="" aria-hidden="true" tabindex="-1" type="search"><input id="search" placeholder="SEARCH" name="query" class="input aa-input" autocomplete="off" spellcheck="false" role="combobox" aria-autocomplete="both" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-3" style="position: relative; vertical-align: top; background-color: transparent;" dir="auto" type="search" value="{{request()->input('query')}}"><span class="aa-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;" role="listbox" id="algolia-autocomplete-listbox-3"><div class="aa-dataset-4"></div><div class="aa-dataset-5"></div></span></span><span class="aa-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;" role="listbox" id="algolia-autocomplete-listbox-0"><div class="aa-dataset-1"></div><div class="aa-dataset-2"></div></span></span> <button type="submit" class="button is-primary in-caps is-hidden-mobile">
        Search
    </button></form>