<div>
  <!-- receipt table -->
  <div class="row">
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

      * {
        font-family: "Poppins", sans-serif;
      }

      .print-container {
        border: #733686 dotted 1px;
        width: 500px;
        height: 600px;
      }

      .row {
        margin: 5px;
      }

      .client-info p {
        font-size: 12px;
        margin: 4px;
      }

      .bold {
        font-weight: bold !important;
      }

      .msg {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 6px;
      }

      .msg p {
        margin-bottom: 0px;
        font-size: 10px;
      }

      .font {
        font-size: 11px;
      }

      .header {
        align-items: center;
        flex-direction: column;
      }

      .header p {
        font-size: 12px;
        padding: 4px 7px;
        color: rgb(2, 82, 13);
        background-color: rgb(90, 235, 90);
        border-radius: 17px;
      }

      .fw-bold {
        font-weight: bold;
      }

      .bg-blue p {
        margin-bottom: 0px;
      }

      .total {
        margin-bottom: 10px;
      }

      .total .total-amt {
        font-size: 1.2rem;
        font-weight: bold;
      }
    </style>
    <div class="container print-container">
      <div class="row">
        <div class="col-12 px-0 mb-2">
          <div class="box-right">
            <div class="d-flex pb-2 header">
              <h3>Pacho Design</h3>
              <p class="fw-bold h9">
                Station MRS, Kotto-Bonamousadai Douala, Cameroon
              </p>
            </div>
            <div class="bg-blue p-2 msg">
              <p>Whatsapp</p>
              <p class="fw-bold">+237 123 456 789 / +237 123456788</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">

        <div class="client-info">
          <h6 class="textmuted h8">Invoice</h6>
           <p class="fw-bold h7">{{ $order->full_name }}</p>
          <p class="textmuted h8">{{ $order->address }}</p>
          <p class="textmuted h8 mb-2">{{ $order->mobile }}</p>
           </div>
      </div>
      <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
          <tr>
            <th>Items</th>
            <th>Qty</th>
            <th>Advance</th>
            <th>Due Date</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row">suit</td>
            <td scope="row">01</td>
            <td scope="row">25800Fcfa</td>
            <td scope="row">23/12/2021</td>
            <td scope="row">15000Fcfa</td>
          </tr>
          <tr>
            <td scope="row">Details</td>
          </tr>
          <tr>
            <td scope="row"></td>
            <td scope="row"></td>
            <td scope="row"></td>
            <td scope="row text-bold"></td>
            <td scope="row bold total-amt"></td>
          </tr>
        </tbody>
      </table>
      <div class="row total">
        <div class="col-md-2"></div>
        <div class="col-md-3">Total</div>
        <div class="col-md-4 total-amt">40000Fcfa</div>
      </div>
      <div class="row msg">
        <p>Thank you for doing business with us!</p>
        <p>Have a wonderful day!</p>
      </div>

      <div class="row mt-3">
        <button
          type="button"
          class="btn btn-primary w-50 no-print"
          id="print"
        >
          Print
        </button>
      </div>
    </div>
  </div>
</div>
