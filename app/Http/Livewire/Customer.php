<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer as Customers;



class Customer extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $firstname, $lastname, $email, $phone, $ids;
    public $searchTerm;

    public function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
    }

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'phone' => 'required'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function store()
    {

        $validatedData = $this->validate();
        Customers::create($validatedData);
        session()->flash('message', 'Customer data created successfully');
        $this->resetInputFields();
        $this->resetValidation();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id)
    {
        $customer = Customers::find($id);
        if ($customer) {

            $this->ids = $customer->id;
            $this->firstname = $customer->firstname;
            $this->lastname = $customer->lastname;
            $this->email = $customer->email;
            $this->phone = $customer->phone;
        } else {
            return redirect()->to('/customer');
        }
    }

    public function closeModal()
    {
        $this->resetInputFields();
    }



    public function update()
    {
        $validatedData = $this->validate();
        Customers::where('id', $this->ids)->update([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone']
        ]);
        session()->flash('message', 'Customer updated succesfully');
        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function delete($id)
    {


        $customer = Customers::find($id);
        if ($customer) {

            $this->ids = $customer->id;
            $this->firstname = $customer->firstname;
            $this->lastname = $customer->lastname;
            $this->email = $customer->email;
            $this->phone = $customer->phone;
        } else {
            return redirect()->to('/customer');
        }
    }

    public function destroy()
    {
        Customers::find($this->ids)->delete();
        session()->flash('message', 'Customer deleted succesfully');
        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $customer = Customers::where('firstname', 'LIKE', $searchTerm)
            ->orWhere('lastname', 'LIKE', $searchTerm)
            ->orWhere('email', 'LIKE', $searchTerm)
            ->orWhere('phone', 'LIKE', $searchTerm)
            ->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.customer', ['customer' => $customer]);
    }
}
