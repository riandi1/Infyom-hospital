<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class DefaultModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            [
                'name'      => 'Patients',
                'is_active' => 1,
                'route'     => 'patients.index',
            ],
            [
                'name'      => 'Doctors',
                'is_active' => 1,
                'route'     => 'doctors.index',
            ],
            [
                'name'      => 'Accountants',
                'is_active' => 1,
                'route'     => 'accountants.index',
            ],
            [
                'name'      => 'Medicines',
                'is_active' => 1,
                'route'     => 'medicines.index',
            ],
            [
                'name'      => 'Nurses',
                'is_active' => 1,
                'route'     => 'nurses.index',
            ],
            [
                'name'      => 'Receptionists',
                'is_active' => 1,
                'route'     => 'receptionists.index',
            ],
            [
                'name'      => 'Lab Technicians',
                'is_active' => 1,
                'route'     => 'lab-technicians.index',
            ],
            [
                'name'      => 'Pharmacists',
                'is_active' => 1,
                'route'     => 'pharmacists.index',
            ],
            [
                'name'      => 'Birth Reports',
                'is_active' => 1,
                'route'     => 'birth-reports.index',
            ],
            [
                'name'      => 'Death Reports',
                'is_active' => 1,
                'route'     => 'death-reports.index',
            ],
            [
                'name'      => 'Investigation Reports',
                'is_active' => 1,
                'route'     => 'investigation-reports.index',
            ],
            [
                'name'      => 'Operation Reports',
                'is_active' => 1,
                'route'     => 'operation-reports.index',
            ],
            [
                'name'      => 'Income',
                'is_active' => 1,
                'route'     => 'incomes.index',
            ],
            [
                'name'      => 'Expense',
                'is_active' => 1,
                'route'     => 'expenses.index',
            ],
            [
                'name'      => 'SMS',
                'is_active' => 1,
                'route'     => 'sms.index',
            ],
            [
                'name'      => 'IPD Patients',
                'is_active' => 1,
                'route'     => 'ipd.patient.index',
            ],
            [
                'name'      => 'OPD Patients',
                'is_active' => 1,
                'route'     => 'opd.patient.index',
            ],
            [
                'name'      => 'Accounts',
                'is_active' => 1,
                'route'     => 'accounts.index',
            ],
            [
                'name'      => 'Employee Payrolls',
                'is_active' => 1,
                'route'     => 'employee-payrolls.index',
            ],
            [
                'name'      => 'Invoices',
                'is_active' => 1,
                'route'     => 'invoices.index',

            ],
            [
                'name'      => 'Payments',
                'is_active' => 1,
                'route'     => 'payments.index',
            ],
            [
                'name'      => 'Payment Reports',
                'is_active' => 1,
                'route'     => 'payment.reports',
            ],
            [
                'name'      => 'Advance Payments',
                'is_active' => 1,
                'route'     => 'advanced-payments.index',
            ],
            [
                'name'      => 'Bills',
                'is_active' => 1,
                'route'     => 'bills.index',
            ],
            [
                'name'      => 'Bed Types',
                'is_active' => 1,
                'route'     => 'bed-types.index',
            ],
            [
                'name'      => 'Beds',
                'is_active' => 1,
                'route'     => 'beds.index',
            ],
            [
                'name'      => 'Bed Assigns',
                'is_active' => 1,
                'route'     => 'bed-assigns.index',
            ],
            [
                'name'      => 'Blood Banks',
                'is_active' => 1,
                'route'     => 'blood-banks.index',
            ],
            [
                'name'      => 'Blood Donors',
                'is_active' => 1,
                'route'     => 'blood-donors.index',
            ],
            [
                'name'      => 'Documents',
                'is_active' => 1,
                'route'     => 'documents.index',
            ],
            [
                'name'      => 'Document Types',
                'is_active' => 1,
                'route'     => 'document-types.index',
            ],
            [
                'name'      => 'Services',
                'is_active' => 1,
                'route'     => 'services.index',
            ],
            [
                'name'      => 'Insurances',
                'is_active' => 1,
                'route'     => 'insurances.index',
            ],
            [
                'name'      => 'Packages',
                'is_active' => 1,
                'route'     => 'packages.index',
            ],
            [
                'name'      => 'Ambulances',
                'is_active' => 1,
                'route'     => 'ambulances.index',
            ],
            [
                'name'      => 'Ambulances Calls',
                'is_active' => 1,
                'route'     => 'ambulance-calls.index',
            ],
            [
                'name'      => 'Appointments',
                'is_active' => 1,
                'route'     => 'appointments.index',
            ],
            [
                'name'      => 'Call Logs',
                'is_active' => 1,
                'route'     => 'call_logs.index',
            ],
            [
                'name'      => 'Visitors',
                'is_active' => 1,
                'route'     => 'visitors.index',
            ],
            [
                'name'      => 'Postal Receive',
                'is_active' => 1,
                'route'     => 'receives.index',
            ],
            [
                'name'      => 'Postal Dispatch',
                'is_active' => 1,
                'route'     => 'dispatches.index',
            ],
            [
                'name'      => 'Notice Boards',
                'is_active' => 1,
                'route'     => 'noticeboard',
            ],
            [
                'name'      => 'Mail',
                'is_active' => 1,
                'route'     => 'mail',
            ],
            [
                'name'      => 'Enquires',
                'is_active' => 1,
                'route'     => 'enquiries',
            ],
            [
                'name'      => 'Charge Categories',
                'is_active' => 1,
                'route'     => 'charge-categories.index',
            ],
            [
                'name'      => 'Charges',
                'is_active' => 1,
                'route'     => 'charges.index',
            ],
            [
                'name'      => 'Doctor OPD Charges',
                'is_active' => 1,
                'route'     => 'doctor-opd-charges.index',
            ],
            [
                'name'      => 'Items Categories',
                'is_active' => 1,
                'route'     => 'item-categories.index',
            ],
            [
                'name'      => 'Items',
                'is_active' => 1,
                'route'     => 'items.index',
            ],
            [
                'name'      => 'Item Stocks',
                'is_active' => 1,
                'route'     => 'item.stock.index',
            ],
            [
                'name'      => 'Issued Items',
                'is_active' => 1,
                'route'     => 'issued.item.index',
            ],
            [
                'name'      => 'Diagnosis Categories',
                'is_active' => 1,
                'route'     => 'diagnosis.category.index',
            ],
            [
                'name'      => 'Diagnosis Tests',
                'is_active' => 1,
                'route'     => 'patient.diagnosis.test.index',
            ],
            [
                'name'      => 'Pathology Categories',
                'is_active' => 1,
                'route'     => 'pathology.category.index',
            ],
            [
                'name'      => 'Pathology Tests',
                'is_active' => 1,
                'route'     => 'pathology.test.index',
            ],
            [
                'name'      => 'Radiology Categories',
                'is_active' => 1,
                'route'     => 'radiology.category.index',
            ],
            [
                'name'      => 'Radiology Tests',
                'is_active' => 1,
                'route'     => 'radiology.test.index',
            ],
            [
                'name'      => 'Medicine Categories',
                'is_active' => 1,
                'route'     => 'categories.index',
            ],
            [
                'name'      => 'Medicine Brands',
                'is_active' => 1,
                'route'     => 'brands.index',
            ],
            [
                'name'      => 'Doctor Departments',
                'is_active' => 1,
                'route'     => 'doctor-departments.index',
            ],
            [
                'name'      => 'Schedules',
                'is_active' => 1,
                'route'     => 'schedules.index',
            ],
            [
                'name'      => 'Prescriptions',
                'is_active' => 1,
                'route'     => 'prescriptions.index',
            ],
            [
                'name'      => 'Cases',
                'is_active' => 1,
                'route'     => 'patient-cases.index',
            ],
            [
                'name'      => 'Case Handlers',
                'is_active' => 1,
                'route'     => 'case-handlers.index',
            ],
            [
                'name'      => 'Patient Admissions',
                'is_active' => 1,
                'route'     => 'patient-admissions.index',
            ],
            [
                'name'      => 'My Payrolls',
                'is_active' => 1,
                'route'     => 'payroll',
            ],
            [
                'name'      => 'Patient Cases',
                'is_active' => 1,
                'route'     => 'patients.cases',
            ],
            [
                'name'      => 'Testimonial',
                'is_active' => 1,
                'route'     => 'testimonials.index',
            ],
            [
                'name'      => 'Blood Donations',
                'is_active' => 1,
                'route'     => 'blood-donations.index',
            ],
            [
                'name'      => 'Blood Issues',
                'is_active' => 1,
                'route'     => 'blood-issues.index',
            ],
            [
                'name'      => 'Live Consultations',
                'is_active' => 1,
                'route'     => 'live.consultation.index',
            ],
            [
                'name'      => 'Live Meetings',
                'is_active' => 1,
                'route'     => 'live.meeting.index',
            ],
        ];
        foreach ($input as $data) {
            $module = Module::whereName($data['name'])->first();
            if ($module) {
                $module->update(['route' => $data['route']]);
            } else {
                Module::create($data);
            }
        }
    }
}
