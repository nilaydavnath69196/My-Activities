/*

NILAY DAV NATH
TOPIC : JAVA PROJECT - TEMPERATURE CONVERTER USING JAVA SWING 
DEPERTMENT OF COMPUTER SCIENCE AND ENGINEERING
DATE : 31/05/2025

 */

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class TemperatureConverter {
    public static void main(String[] args) {
        // Create the main window (JFrame)
        JFrame frame = new JFrame("Temperature Converter");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(450, 300);
        frame.setLocationRelativeTo(null); // Center the window

        // Create the main panel to hold everything
        JPanel mainPanel = new JPanel();
        mainPanel.setLayout(new BoxLayout(mainPanel, BoxLayout.Y_AXIS));
        mainPanel.setBorder(BorderFactory.createEmptyBorder(15, 15, 15, 15)); // Add padding

        // Create fonts for labels and text fields
        Font labelFont = new Font("Merriweather", Font.BOLD, 15);
        Font fieldFont = new Font("Merriweather", Font.PLAIN, 14);

        // Input panel: Label and TextField for user input
        JPanel inputPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        JLabel inputLabel = new JLabel("Enter Temperature:");
        inputLabel.setFont(labelFont);
        JTextField inputField = new JTextField(15);
        inputField.setFont(fieldFont);
        inputPanel.add(inputLabel);
        inputPanel.add(inputField);

        // Control panel: Dropdown for conversion type and Convert button
        JPanel controlPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        String[] options = {
            "Celsius to Fahrenheit",
            "Fahrenheit to Celsius",
            "Celsius to Kelvin",
            "Kelvin to Celsius",
            "Fahrenheit to Kelvin",
            "Kelvin to Fahrenheit"
        };
        JComboBox<String> conversionType = new JComboBox<>(options);
        conversionType.setFont(fieldFont);

        JButton convertButton = new JButton("Convert");
        convertButton.setFont(labelFont);

        controlPanel.add(conversionType);
        controlPanel.add(convertButton);

        // Result panel: Label and TextField to show the result
        JPanel resultPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        JLabel resultLabel = new JLabel("Converted Temperature:");
        resultLabel.setFont(labelFont);
        JTextField resultField = new JTextField(15);
        resultField.setFont(fieldFont); 
        resultField.setEditable(false); // Make result field read-only
        resultPanel.add(resultLabel);
        resultPanel.add(resultField);

        // Add input, control, and result panels to the main panel
        mainPanel.add(inputPanel);
        mainPanel.add(controlPanel);
        mainPanel.add(resultPanel);

        // Add main panel to the window (frame)
        frame.add(mainPanel);

        // Add action listener to Convert button
        convertButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    // Read the temperature entered by the user
                    double temp = Double.parseDouble(inputField.getText());
                    String selectedOption = (String) conversionType.getSelectedItem();
                    double result = 0;

                    // Do the conversion based on the selected option
                    switch (selectedOption) {
                        case "Celsius to Fahrenheit":
                            result = (temp * 9 / 5) + 32;
                            break;
                        case "Fahrenheit to Celsius":
                            result = (temp - 32) * 5 / 9;
                            break;
                        case "Celsius to Kelvin":
                            result = temp + 273.15;
                            break;
                        case "Kelvin to Celsius":
                            result = temp - 273.15;
                            break;
                        case "Fahrenheit to Kelvin":
                            result = (temp - 32) * 5 / 9 + 273.15;
                            break;
                        case "Kelvin to Fahrenheit":
                            result = (temp - 273.15) * 9 / 5 + 32;
                            break;
                    }

                    // Show the converted temperature in the result field (2 decimal places)
                    resultField.setText(String.format("%.2f", result));
                } catch (NumberFormatException ex) {
                    // Show error message if input is not a valid number
                    JOptionPane.showMessageDialog(frame, "Please enter a valid number", "Input Error", JOptionPane.ERROR_MESSAGE);
                }
            }
        });

        // Make the window visible
        frame.setVisible(true);
    }
}
