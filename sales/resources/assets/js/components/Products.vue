<template>
	<table v-if="prods.length > 0" class="table">
		<thead>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Category</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
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
					{{ cats[prod.category_id] }}
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
		</tbody>
	</table>

	<span v-else>No products to show</span>
</template>

<script>
	export default {
		props: ['initial', 'categories'],

		data: function() {
			var cats = {}
			this.categories.forEach(function(cat){
				cats[cat.id] = cat.name
			});

			return {
				prods: this.initial,
				cats: cats,
				errors: {},
			}
		},

		methods: {
			editUrl(prod){
				return "/products/" + prod + "/edit";
			},

			destroy(prod){
				let confirmation = confirm("Do you really want to delete this product?");
				let url = '/products/' + prod.id;
				if(confirmation){
					axios.delete(url)
					.then(response => {
						console.log(response)
						this.prods = this.prods.filter(function(obj){
							return obj != prod;
						});
					});
				}
			},
		},
	}
</script>
