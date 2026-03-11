{{-- Shared form fields for create and edit --}}

<div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
        <option value="">-- select --</option>
        {{-- TODO: foreach $categories as $cat: <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option> --}}
    </select>
    @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $product->name ?? '') }}" required>
    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea id="description" name="description" rows="4"
              class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label for="price" class="form-label">Price (€)</label>
        <input id="price" type="number" step="0.01" name="price"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price', $product->price ?? '') }}" required>
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label for="stock" class="form-label">Stock</label>
        <input id="stock" type="number" name="stock"
               class="form-control @error('stock') is-invalid @enderror"
               value="{{ old('stock', $product->stock ?? 0) }}" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label for="brand" class="form-label">Brand</label>
        <input id="brand" type="text" name="brand" class="form-control"
               value="{{ old('brand', $product->brand ?? '') }}">
    </div>
    <div class="col-md-4">
        <label for="color" class="form-label">Color</label>
        <select id="color" name="color" class="form-select">
            <option value="">-- select --</option>
            @foreach(['Black','White','Silver','Blue','Red','Green','Yellow'] as $c)
                <option value="{{ $c }}" {{ old('color', $product->color ?? '') === $c ? 'selected' : '' }}>{{ $c }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="images" class="form-label">
        Images <small class="text-muted">(minimum 2 required on creation)</small>
    </label>
    <input id="images" type="file" name="images[]" class="form-control @error('images') is-invalid @enderror"
           multiple accept="image/*">
    @error('images')<div class="invalid-feedback">{{ $message }}</div>@enderror
    @error('images.*')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
           {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active (visible to customers)</label>
</div>
