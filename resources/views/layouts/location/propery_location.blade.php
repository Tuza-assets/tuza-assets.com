    <div class="row">
        <!-- Hidden inputs for names -->
        <input type="hidden" name="province" id="province_name" value="{{ $property->province ?? '' }}">
        <input type="hidden" name="district" id="district_name" value="{{ $property->district ?? '' }}">
        <input type="hidden" name="sector" id="sector_name" value="{{ $property->sector ?? '' }}">
        <input type="hidden" name="cell" id="cell_name" value="{{ $property->cell ?? '' }}">
        <input type="hidden" name="village" id="village_name" value="{{ $property->village ?? '' }}">

        <!-- Country Field -->
        <div class="form-group col-md-6">
            <label>Country</label>
            <input type="text" class="form-control border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" 
                   name="country" value="{{ $property->country ?? 'Rwanda' }}" readonly>
        </div>

        <!-- Province Selection -->
        <div class="form-group col-md-6">
            <label for="province_select">Province</label>
            <select id="province_select" class="form-control border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                <option value="">Select Province</option>
            </select>
        </div>

        <!-- District Selection -->
        <div class="form-group col-md-6">
            <label for="district_select">District</label>
            <select id="district_select" class="form-control border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                <option value="">Select District</option>
                <option value="District1" {{ (isset($property) && $property->district === 'District1') ? 'selected' : '' }}>District 1</option>
                <option value="District2" {{ (isset($property) && $property->district === 'District2') ? 'selected' : '' }}>District 2</option>
            </select>
        </div>

        <!-- Sector Selection -->
        <div class="form-group col-md-6">
            <label for="sector_select">Sector</label>
            <select id="sector_select" class="form-control border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                <option value="">Select Sector</option>
                <option value="Sector1" {{ (isset($property) && $property->sector === 'Sector1') ? 'selected' : '' }}>Sector 1</option>
                <option value="Sector2" {{ (isset($property) && $property->sector === 'Sector2') ? 'selected' : '' }}>Sector 2</option>
            </select>
        </div>

        <!-- Cell Selection -->
        <div class="form-group col-md-6">
            <label for="cell_select">Cell</label>
            <select id="cell_select" class="form-control border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                <option value="">Select Cell</option>
                <option value="Cell1" {{ (isset($property) && $property->cell === 'Cell1') ? 'selected' : '' }}>Cell 1</option>
                <option value="Cell2" {{ (isset($property) && $property->cell === 'Cell2') ? 'selected' : '' }}>Cell 2</option>
            </select>
        </div>

        <!-- Village Selection -->
        <div class="form-group col-md-6">
            <label for="village_select">Village</label>
            <select id="village_select" class="form-control border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                <option value="">Select Village</option>
                <option value="Village1" {{ (isset($property) && $property->village === 'Village1') ? 'selected' : '' }}>Village 1</option>
                <option value="Village2" {{ (isset($property) && $property->village === 'Village2') ? 'selected' : '' }}>Village 2</option>
            </select>
        </div>

        <!-- Zoning Field -->
        <div class="form-group col-md-6">
            <label class="block mb-2 text-sm font-medium text-gray-700">Zoning:</label>
            <select name="zoning_id" class="w-100 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                @foreach ($zonnings as $zoning)
                    <option value="{{ $zoning->id }}" {{ (isset($property) && $property->zoning_id == $zoning->id) ? 'selected' : '' }}>
                        {{ $zoning->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Map Link -->
        <div class="form-group col-md-6">
            <label class="block mb-2 text-sm font-bold text-gray-700">Map Link:</label>
            <input type="text" name="map_link" 
                   value="{{ $property->map_link ?? '' }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>
    </div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const baseUrl = 'https://property.tuza-assets.com/api/v1/locations';
    
    // Elements - Selects
    const provinceSelect = document.getElementById('province_select');
    const districtSelect = document.getElementById('district_select');
    const sectorSelect = document.getElementById('sector_select');
    const cellSelect = document.getElementById('cell_select');
    const villageSelect = document.getElementById('village_select');

    // Elements - Hidden Inputs
    const provinceInput = document.getElementById('province_name');
    const districtInput = document.getElementById('district_name');
    const sectorInput = document.getElementById('sector_name');
    const cellInput = document.getElementById('cell_name');
    const villageInput = document.getElementById('village_name');

    // Fetch Provinces
    fetch(`${baseUrl}/provinces`)
        .then(response => response.json())
        .then(data => {
            const provinces = data.data;
            provinces.forEach(province => {
                const option = document.createElement('option');
                option.value = province.id;
                option.textContent = province.name;
                option.dataset.name = province.name;
                provinceSelect.add(option);
            });
        })
        .catch(error => console.error('Error:', error));

    // Province Change Event
    provinceSelect.addEventListener('change', function() {
        resetSelects('district');
        if (this.value) {
            const selectedOption = this.options[this.selectedIndex];
            provinceInput.value = selectedOption.dataset.name;
            fetchLocations(`${baseUrl}/provinces/${this.value}/districts`, districtSelect);
            districtSelect.disabled = false;
        }
    });

    // District Change Event
    districtSelect.addEventListener('change', function() {
        resetSelects('sector');
        if (this.value) {
            const selectedOption = this.options[this.selectedIndex];
            districtInput.value = selectedOption.dataset.name;
            fetchLocations(`${baseUrl}/districts/${this.value}/sectors`, sectorSelect);
            sectorSelect.disabled = false;
        }
    });

    // Sector Change Event
    sectorSelect.addEventListener('change', function() {
        resetSelects('cell');
        if (this.value) {
            const selectedOption = this.options[this.selectedIndex];
            sectorInput.value = selectedOption.dataset.name;
            fetchLocations(`${baseUrl}/sectors/${this.value}/cells`, cellSelect);
            cellSelect.disabled = false;
        }
    });

    // Cell Change Event
    cellSelect.addEventListener('change', function() {
        resetSelects('village');
        if (this.value) {
            const selectedOption = this.options[this.selectedIndex];
            cellInput.value = selectedOption.dataset.name;
            fetchLocations(`${baseUrl}/cells/${this.value}/villages`, villageSelect);
            villageSelect.disabled = false;
        }
    });

    // Village Change Event
    villageSelect.addEventListener('change', function() {
        if (this.value) {
            const selectedOption = this.options[this.selectedIndex];
            villageInput.value = selectedOption.dataset.name;
        }
    });

    // Helper Functions
    function fetchLocations(url, selectElement) {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const locations = data.data;
                locations.forEach(location => {
                    const option = document.createElement('option');
                    option.value = location.id;
                    option.textContent = location.name;
                    option.dataset.name = location.name;
                    selectElement.add(option);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    function resetSelects(startFrom) {
        const selects = {
            district: [districtSelect, sectorSelect, cellSelect, villageSelect],
            sector: [sectorSelect, cellSelect, villageSelect],
            cell: [cellSelect, villageSelect],
            village: [villageSelect]
        };

        const inputs = {
            district: [districtInput, sectorInput, cellInput, villageInput],
            sector: [sectorInput, cellInput, villageInput],
            cell: [cellInput, villageInput],
            village: [villageInput]
        };

        selects[startFrom].forEach(select => {
            select.innerHTML = '<option value="">Select ' + select.id.replace('_select', '').charAt(0).toUpperCase() + select.id.replace('_select', '').slice(1) + '</option>';
            select.disabled = true;
        });

        // Reset corresponding hidden inputs
        inputs[startFrom].forEach(input => {
            input.value = '';
        });
    }
});
</script>