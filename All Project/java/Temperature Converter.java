import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class TemperatureConverter {
    public static void main(String[] args) {
        JFrame frame = new JFrame("Temperature Converter");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(450, 300);
        frame.setLocationRelativeTo(null); 

        JPanel mainPanel = new JPanel();
        mainPanel.setLayout(new BoxLayout(mainPanel, BoxLayout.Y_AXIS));
        mainPanel.setBorder(BorderFactory.createEmptyBorder(15, 15, 15, 15)); 

        Font labelFont = new Font("Merriweather", Font.BOLD, 15);
        Font fieldFont = new Font("Merriweather", Font.PLAIN, 14);

        JPanel inputPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        JLabel inputLabel = new JLabel("Enter Temperature:");
        inputLabel.setFont(labelFont);
        JTextField inputField = new JTextField(15);
        inputField.setFont(fieldFont);
        inputPanel.add(inputLabel);
        inputPanel.add(inputField);

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
        JPanel resultPanel = new JPanel(new FlowLayout(FlowLayout.LEFT));
        JLabel resultLabel = new JLabel("Converted Temperature:");
        resultLabel.setFont(labelFont);
        JTextField resultField = new JTextField(15);
        resultField.setFont(fieldFont);
        resultField.setEditable(false); 
        resultPanel.add(resultLabel);
        resultPanel.add(resultField);
        mainPanel.add(inputPanel);
        mainPanel.add(controlPanel);
        mainPanel.add(resultPanel);

        frame.add(mainPanel);

        convertButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                try {
                    double temp = Double.parseDouble(inputField.getText());
                    String selectedOption = (String) conversionType.getSelectedItem();
                    double result = 0;
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
                    resultField.setText(String.format("%.2f", result));
                } catch (NumberFormatException ex) {
                    JOptionPane.showMessageDialog(frame, "Please enter a valid number", "Input Error",
                            JOptionPane.ERROR_MESSAGE);
                }
            }
        });

        frame.setVisible(true);
    }
}
