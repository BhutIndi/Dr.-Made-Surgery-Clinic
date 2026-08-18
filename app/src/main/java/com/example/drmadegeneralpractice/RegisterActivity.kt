package com.example.drmadegeneralpractice

import android.app.DatePickerDialog
import android.os.Bundle
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.CheckBox
import android.widget.EditText
import android.widget.Spinner
import android.widget.TextView
import android.widget.Toast
import java.util.Calendar
import androidx.appcompat.app.AppCompatActivity


class RegisterActivity : AppCompatActivity() {

    //class variables
    private lateinit var medicalAidProvider: Spinner
    private lateinit var dateOfBirth: EditText
    private lateinit var termsCheckBox: CheckBox
    private lateinit var createAccBtn: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_registeration)

        //for the medical aid drop down
        medicalAidProvider = findViewById(R.id.medicalAidProvider)


        val providers = arrayOf(
            "Select provider",
            "Bestmed",
            "Bonitas",
            "Discovery Health",
            "Fedhealth",
            "GEMS",
            "Medihelp",
            "Momentum Health",
            "Other"
        )

        val providerAdapter = ArrayAdapter(
            this,
            android.R.layout.simple_spinner_item,
            providers
        )

        providerAdapter.setDropDownViewResource(
            android.R.layout.simple_spinner_dropdown_item
        )

        medicalAidProvider.adapter = providerAdapter

        //for the date of birth datepicker
        dateOfBirth = findViewById(R.id.dateOfBirth)

        //for pressing the date field
        dateOfBirth.setOnClickListener {
            val calendar = Calendar.getInstance()

            val year = calendar.get(Calendar.YEAR)
            val month = calendar.get(Calendar.MONTH)
            val day = calendar.get(Calendar.DAY_OF_MONTH)

            //format of the date
            val datePickerDialog = DatePickerDialog(
                this,
                {_, selectedYear, selectedMonth, selectedDay ->
                    val formattedDay = String.format(
                        "%02d",
                        selectedDay
                    )

                    val formattedMonth = String.format(
                        "%02d",
                        selectedMonth + 1
                    )

                    dateOfBirth.setText(
                        "$formattedDay/$formattedMonth/$selectedYear"
                    )
                },

                year,
                month,
                day
            )

            datePickerDialog.show()
        }

        //creating the account
        createAccBtn = findViewById(R.id.createAccountButton)
        termsCheckBox = findViewById(R.id.termsCheckBox)

        createAccBtn.setOnClickListener {
            if (!termsCheckBox.isChecked) {

                Toast.makeText(
                    this,
                    "Please agree to the Terms of Service and Privacy Policy.",
                    Toast.LENGTH_SHORT
                ).show()

                return@setOnClickListener
            }

            //account creation code will go here
        }


        //for the back button
        findViewById<TextView>(R.id.backButton).setOnClickListener {
            onBackPressedDispatcher.onBackPressed()
        }
    }
}