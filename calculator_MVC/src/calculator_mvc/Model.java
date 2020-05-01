
package calculator_mvc;


import java.util.ArrayList;
import java.util.Arrays;
import java.util.LinkedList;
import java.util.Observable;
import java.util.LinkedList;
import java.util.List;
import java.util.Observable;


public class Model extends Observable {

    private String currentTotal;
    private String currentInputString;

    public Model() {
        currentTotal = "0";
        currentInputString = "";
    }

    public void computeString() {

        LinkedList<String> operationInputs = new StringParser(currentInputString).getInputs();
// operationInputs = all extracted inputs separated with com
        MathOperationsList operations = new MathOperationsList();

        operationInputs = performMathInSequence(operationInputs , operations);

        boolean hasOnlyOneInput = (operationInputs.size() == 1);

        if (hasOnlyOneInput) {
            setCurrentTotal(operationInputs.get(0));
        } else {
            System.out.println("something went wrong");
        }

    }

    private LinkedList<String> performMathInSequence(LinkedList<String> operationTokens, MathOperationsList Operations) {
        for (String operation : Operations) {
            operationTokens = performOperations(operation, operationTokens);
        }
        return operationTokens;
    }

    private LinkedList<String> performOperations(String operation, LinkedList<String> tokens) {

        boolean isOperationCompleted = false;

        while (isOperationCompleted == false) {
            if (tokens.contains(operation)) {
                int operatorIndex = tokens.indexOf(operation);
                int firstOperandIndex = operatorIndex - 1;
                int secondOperandIndex = operatorIndex + 1;

                String firstOperand = tokens.get(operatorIndex - 1);
                String secondOperand = tokens.get(operatorIndex + 1);
                float computationResult;

                // perform the relevant operation
                switch (operation) {
                case "*":computationResult = Float.parseFloat(firstOperand)*Float.parseFloat(secondOperand);break;
                case "/":computationResult = Float.parseFloat(firstOperand)/Float.parseFloat(secondOperand);break;
                case "+":computationResult = Float.parseFloat(firstOperand)+Float.parseFloat(secondOperand);break;
                case "-":computationResult = Float.parseFloat(firstOperand)-Float.parseFloat(secondOperand);break;
                default:computationResult = (float) 69.69;
                    System.out.println("Cannot detect operation"); break;
                }

                // cast the operation back into a String
                String tokenizedComputation = Float.toString(computationResult);

                // remove all relevant tokens
                tokens.remove(secondOperandIndex);
                tokens.remove(operatorIndex);
                tokens.remove(firstOperandIndex);
                //System.out.println(tokens);

                // place relevant token into relevant position
                tokens.add(firstOperandIndex, tokenizedComputation);
System.out.println(tokens);
return tokens;
           }
else {

                isOperationCompleted = true;
                System.out.println(tokens);
                return tokens;              
            }

        }

        return tokens;
    }

    public void Clear() {
        currentTotal = "0";
        currentInputString = "";

        setChanged();

        CalcDisplayData update = new CalcDisplayData();
        update.setComputationText(currentInputString);
        update.setCurrentTotal(currentTotal);

        notifyObservers(update);

    }

    public void setComputationText(String newInputString) {
        currentInputString = newInputString;

        setChanged();

        CalcDisplayData update = new CalcDisplayData();
        update.setComputationText(newInputString);

        notifyObservers(update);

    }

    public void setCurrentTotal(String newTotal) {
        float floatTotal = Float.parseFloat(newTotal);
        int intTotal = (int) floatTotal;

        setCurrentTotalAsIntValueIfPossible(floatTotal, intTotal);

        setChanged();

        CalcDisplayData update = new CalcDisplayData();
        update.setCurrentTotal(currentTotal);

        notifyObservers(update);

    }

    private void setCurrentTotalAsIntValueIfPossible(float floatTotal, int intTotal) {
        if (floatTotal == intTotal) {
            currentTotal = Integer.toString(intTotal);
        } else {
            currentTotal = Float.toString(floatTotal);
        }
    }

}

class CalcDisplayData {

    String currentTotal;
    String currentInputString;

    public void setComputationText(String computationText) {
        currentInputString = computationText;
    }

    public void setCurrentTotal(String newTotal) {
        currentTotal = newTotal;
    }

    public String getCurrentTotal() {
        return currentTotal;
    }

    public String getCurrentInputString() {
        return currentInputString;
    }

}

class MathOperationsList extends ArrayList <String>{

    public MathOperationsList(){
        super();
        add("*");
        add("/");
        add("+");
        add("-");   
    }

}
class StringParser {

    static public final String WITH_DELIMITERS = "((?<=%1$s)|(?=%1$s))";
    LinkedList<String> answers;

    public StringParser(String string) {

        List<String> inputList = extractInputs(string);
       answers = transformToLinkedList(inputList);
    }

    public LinkedList<String> getInputs() {
        System.out.println("answers"  + answers);
        return answers;
        
    }

    private List<String> extractInputs(String string) {

        String[] tokens = string
                .split(String.format(WITH_DELIMITERS, "[*/+-]"));
        List<String> linkedTokens = Arrays.asList(tokens);
        System.out.println(linkedTokens);
        return linkedTokens;
        
    }

    private LinkedList<String> transformToLinkedList(List<String> tokenList) {
        LinkedList<String> answers = new LinkedList<String>();
        answers.addAll(tokenList);
        System.out.println(answers);
        return answers;
        
    }

}