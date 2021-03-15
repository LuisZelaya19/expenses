<div>
  <div x-data="select({data: {{$array}}})" x-init="init()" class="relative">
    <div class="mt-2">
      <span>
        <input type="text" class="form-input" @input="keyupSearch($event)" name="search" id="search" x-model="search" x-ref="search" @keydown.arrow-down.stop.prevent="highlightNextOption()" @keydown.arrow-up.stop.prevent="highlightPreviousOption()" @keydown.enter.stop.prevent="selectOption()" autocomplete="off" value="{{old('search')}}" />
        <input type="hidden" name="prueba" id="prueba">
      </span>
    </div>
    <div x-show="open" @click.away="open = false" class="absolute z-10 w-full bg-white" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
      <ul x-ref="results" class="py-1 overflow-auto text-base leading-6 border-2 border-gray-200 rounded-md shadow-lg max-h-60 focus:outline-none sm:text-sm sm:leading-5">
        <template x-for="(key, index) in Object.keys(options)" :key="index">
          <li class="relative py-2 pl-3 text-gray-900 cursor-pointer select-none" :class="{
            'bg-indigo-400':  index === highlightedIndexOption,
            'text-white':  index === highlightedIndexOption
            }" @keydown.enter.prevent="selectOption()">
            <span x-text="Object.values(options)[index]" class="block">
            </span>
          </li>
        </template>
        <div x-show="!Object.keys(options).length" x-text="emptyOptionsMessage" class="px-3 py-2 text-gray-900 cursor-default select-none"></div>
      </ul>
    </div>
  </div>
</div>
@section('scripts')
<script>
  function select(config) {
    return {
      open: false,
      highlightedIndexOption: 0,
      search: '',
      data: config.data,
      options: {},
      value: config.value,
      emptyOptionsMessage: 'No hay resultados que coincidan con su busqueda',

      closeListBox() {
        this.search = Object.values(this.options)[this.highlightedIndexOption];
        this.open = false;
        this.highlightedIndexOption = 0;
      },

      highlightPreviousOption() {
        if (this.highlightedIndexOption > 0) {
          this.highlightedIndexOption--;
          this.scrollIntoView();
        }
      },

      highlightNextOption() {
        if (this.highlightedIndexOption < Object.keys(this.options).length - 1) {
          this.highlightedIndexOption++;
          this.scrollIntoView();
        }
      },

      scrollIntoView() {
        this.$refs.results.children[this.highlightedIndexOption].scrollIntoView({
          block: 'nearest',
          behavior: 'smooth'
        })
      },

      init() {
        this.options = this.data;
        if (!(this.value in this.options)) this.value = null

        this.$watch('search', ((value) => {
          if (value.length < 2)
            this.open = false
        }));
      },

      keyupSearch(e) {
        let value = e.target.value;

        if (value.length >= 2) {
          this.open = true

          this.options = Object.keys(this.data)
            .filter((key) => this.data[key].toLowerCase().includes(value.toLowerCase()))
            .reduce((options, key) => {
              options[key] = this.data[key]
              return options
            }, {})
        }
      },

      selectOption() {
        this.value = Object.keys(this.options)[this.highlightedIndexOption];
        document.getElementById('prueba').setAttribute('value', this.value);
        this.closeListBox();
      },

    }
  }
</script>
@endsection
