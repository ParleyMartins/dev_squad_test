<template>
	<div class="col-md-8 col-md-offset-2">
		<h1>Product</h1>
		<form enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Name" v-model="product.name">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label for="image">Image</label>
					<input type="file" class="form-control" id="image" name="image" placeholder="Image" v-on:change="updateImage($event.target.name, $event.target.files)" accept="image/*">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label for="price">Price</label>
					<input type="number" placeholder="1.0" step="0.01" min="0" max=9999.99 class="form-control" id="price" name="price" v-model="product.price">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label for="category_id">Category</label>
					<select class="form-control" id="category_id" name="category_id" v-model="product.category_id">
						<option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label for="description">Description</label>
					<textarea class="form-control" id="description" name="description" placeholder="description" v-model="product.description"></textarea>
				</div>
			</div>
		</form>

		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-8">

				<a href="/products/" class="btn btn-default">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
					Cancel
				</a>
				<a href="#" @click="makeRequest()" class="btn btn-primary">
					<i class="fa fa-floppy-o" aria-hidden="true"></i>
					Save
				</a>
			</div>
		</div>
		<img v-if="product.image_url" :src="product.image_url" height="100" width="100" :alt="product.name">
		<br>
	</div>
</template>

<script>
	export default {
		props: ['product', 'categories',],

		data: function (){
			return {
				errors: {},
			}
		},

		methods: {
			updateImage(name, file){
				this.product.files = {}
				this.product.files[name] = file[0];
			},

			makeRequest(){
				let pk = this.product.id || ''
				let url = "http://localhost:8000/products/" + pk
				let data = {
					method: pk ? 'PATCH' : 'POST',
					url: url,
					data: this.product,
					headers: {
						'Content-Type': 'application/json'
					}
				}
				console.log(data)
				axios(data)
				.then(response => {
					console.log(response.data);
					window.location.replace('/');
				})
				.catch(error => {
					console.log("ERROR");
					console.log(error)
				});
			},
		},
	}
</script>
