<template>
  <div class="wrapper py-6 overflow-x-hidden">
    <div class="flex justify-between w-full">
      <button
        class="bg-blue-400 p-2 rounded foucs:outline-none text-white focus:outline-none"
        @click="toggelModal"
      >
        Add New Product
      </button>
      <select
        class="bg-white py-2 px-4 border-2 border-gray-200 focus:outline-none focus:border-blue-200"
        @change="categorieChanged"
        v-model="selectedCatgorie"
      >
        <option :value="null" class="text-gray-300">All Categories</option>
        <option :value="c" :key="c.id" v-for="c in categories">
          {{ c.name }}
        </option>
      </select>
    </div>
    <div class="mt-4">
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                      <div
                        class="flex justify-between text-blue-600 cursor-pointer hover:text-blue-800"
                        @click="sortByName()"
                      >
                        <span>Name</span>
                        <i class="fas fa-sort-alpha-up"></i>
                      </div>
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                      <div
                        class="flex justify-between text-blue-600 cursor-pointer hover:text-blue-800"
                        @click="sortByPrice()"
                      >
                        <span>Price</span>
                        <i class="fas fa-sort-alpha-up"></i>
                      </div>
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                      Date
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="p in filredProducts" :key="p.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img
                            class="h-10 w-10 rounded-full"
                            :src="imageUrl(p.image)"
                            alt=""
                          />
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{ p.name }}
                          </div>
                          <div class="text-sm text-gray-500">
                            {{ p.description.substring(0, 30) }}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ p.price }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      {{ p.created_at | datetime }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!--add product modal-->
      <add-product
        v-on:toggelModal="toggelModal"
        v-on:addSuccess="addSuccess"
        :showModal="showModal"
        :cats="categories"
      ></add-product>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
import addProduct from "./addProduct";
export default {
  components: {
    addProduct,
  },
  mounted() {
    Axios.get("/api/products")
      .then((result) => {
        this.products = result.data;
        this.filredProducts = this.products;
      })
      .catch((error) => console.log(error));
    Axios.get("/api/categories")
      .then((result) => (this.categories = result.data))
      .catch((error) => console.log(error));
  },
  data() {
    return {
      products: [],
      filredProducts: [],
      showModal: false,
      categories: [],
      selectedCatgorie: null,
    };
  },
  methods: {
    toggelModal() {
      this.showModal = !this.showModal;
    },
    imageUrl(link) {
      return 'storage' + link;
    },
    sortByName() {
      this.filredProducts = _.sortBy(this.filredProducts, (x) => x.name.toLowerCase());
    },
    sortByPrice() {
      this.filredProducts = _.sortBy(this.filredProducts, (x) => parseFloat(x.price));
    },
    categorieChanged() {
      if (this.selectedCatgorie == null) {
        this.filredProducts = this.products;
      } else {
        Axios.get("/api/category/" + this.selectedCatgorie.id+"/products").then((result) => {
          this.filredProducts = result.data;
        });
      }
    },
    addSuccess(p) {
      this.toggelModal();
      this.products.push(p);
    },
  },
};
</script>
