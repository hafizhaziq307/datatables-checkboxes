@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Alpine Core -->
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

    <style>
        input[type="checkbox"] {
            width: 22px;
            height: 22px;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <section class="card" x-data="datatable_checkbox"
        x-effect="$refs.checkAllButton.indeterminate = selected.length < arr.length && selected.length != []">
        <div class="card-header">
            <h4 class="card-title">Employee index</h4>
        </div>
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center" data-orderable="false" data-searchable="false">
                            <input type="checkbox" x-ref="checkAllButton" class="big-checkbox" @change="checkAll($el)">
                        </th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" x-model="selected"
                                    @change="toggleCheckbox($el, {{ $employee->salary }})" value="{{ $employee->id }}">
                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>RM {{ $employee->salary }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <form action="#" method="post">
                <!-- List of checked checkboxes that will send to backend.
                    Note: change type="hidden" into type="text" to see what data will transfer.-->
                <input type="hidden" name="strCheckboxes" x-model="selected">

                <div class="d-flex justify-content-between">
                    <h5 class="text-xl">
                        Total Salary (selected):
                        <span class="text-primary">
                            RM <span x-text="total.toFixed(2)"></span>
                        </span>
                    </h5>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $('#table').DataTable({
            "pageLength": 3,
            "lengthChange": false,
        });

        let arr = {{ json_encode($employeesId) }};

        document.addEventListener('alpine:init', () => {
            Alpine.data('datatable_checkbox', () => ({
                selected: [],
                total: 0,

                toggleCheckbox(element, $income) {
                    this.total = (element.checked) ? this.total + $income : this.total - $income;
                },

                checkAll(element) {
                    if (element.checked) {
                        this.selected = arr;
                        this.total = {{ $totalSalary }};
                    } else {
                        this.selected = []
                        this.total = 0;
                    }
                }
            }))
        })
    </script>
@endsection
