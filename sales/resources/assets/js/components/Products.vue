<template>
	<table v-if="prods.length > 0" class="table">
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Price</th>
			<th>Category</th>
			<th></th>
			<th></th>
		</tr>
		<tr v-for="prod in prods">
			<td>
				<img :src="prod.image_url" height="100" width="100" :alt="prod.name">
			</td>
			<td>
				{{ prod.name }}
			</td>
			<td>
				{{ prod.price }}
			</td>
			<td>
				{{ prod.category_id }}
			</td>
			<td>
				<a class="btn btn-default" :href="editUrl(prod.id)">
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>
			</td>
			<td>
				<a href="#" class="btn btn-danger" @click.prevent="destroy(prod)">
					<i class="fa fa-trash-o" aria-hidden="true"></i>
				</a>
			</td>
		</tr>
	</table>

	<span v-else>No products to show</span>
</template>

<script>
	export default {
		props: ['initial',],

		data: function() {
			return {
				prods: this.initial,
			}
		},

		// mounted() {
		// 	this.products = this.products;
		// },

		// computed: {
		// 	products() {
		// 		return this.initial-products;
		// 	}
		// },

		methods: {
			// products
			editUrl(prod){
				return "/products/" + prod + "/edit";
			},

			destroy(prod){
				let confirmation = confirm("Do you really want to delete this product?");
				let url = '/products/' + prod.id;
				if(confirmation){
					axios.delete(url)
					.catch(error => {
						console.log(error)
						this.prods = this.prods.filter(function(obj){
							return obj != prod;
						});
					});
				}
			},
		},
	}
</script>
