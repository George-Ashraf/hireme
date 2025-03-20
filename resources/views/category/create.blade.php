<x-app-layout>
    <div class="container col-lg-6 mt-4">
        <h1 class="text-center text-primary">Add Category</h1>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Select Job Category Icon</label>
                <select class="  form-control @error('icon') is-invalid @enderror" name="icon" id="iconSelect"
                    onchange="previewIcon()">
                    <option value="nothing">Select Icon</option>
                    <option value="fa-briefcase">Business & General Jobs</option>
                    <option value="fa-user-tie">Corporate & Executive</option>
                    <option value="fa-laptop-code">Tech & IT</option>
                    <option value="fa-hard-hat">Construction & Engineering</option>
                    <option value="fa-stethoscope">Healthcare & Medical</option>
                    <option value="fa-utensils">Food Service</option>
                    <option value="fa-paint-brush">Creative & Media</option>
                    <option value="fa-truck">Logistics & Transportation</option>
                    <option value="fa-gavel">Legal & Law</option>
                    <option value="fa-graduation-cap">Education & Teaching</option>
                </select>
                @error('icon')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="mt-3">
                    <p>Selected Icon Preview:</p>
                    <i id="iconPreview" class=" text-primary fa-solid fa-briefcase fa-2x"></i>
                </div>

            </div>
            <button class="btn btn-primary">Add Category</button>
        </form>

    </div>



    <script>
    function previewIcon() {
        let selectedIcon = document.getElementById("iconSelect").value;
        let iconPreview = document.getElementById("iconPreview");

        if (selectedIcon) {
            iconPreview.className = "fa-solid " + selectedIcon + " fa-2x text-primary";
        } else {
            iconPreview.className = "fa-solid fa-question fa-2x   "; // Default if nothing is selected
        }
    }
    </script>

</x-app-layout>