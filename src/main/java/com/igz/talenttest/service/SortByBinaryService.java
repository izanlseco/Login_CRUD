package com.igz.talenttest.service;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import com.igz.talenttest.model.NumberAndBinary;
import com.igz.talenttest.Input.NumberAndBinaryInput;
import com.igz.talenttest.Output.NumberAndBinaryOutput;
import org.springframework.stereotype.Service;

@Service public class SortByBinaryService {

    public NumberAndBinaryOutput sortByBinary(NumberAndBinaryInput numberAndBinaryInput) {
        if (numberAndBinaryInput != null) {
            NumberAndBinaryOutput numberAndBinaryOutput = new NumberAndBinaryOutput();
            ArrayList<Integer> unsortedList = numberAndBinaryInput.getUnsortedList();
            //numberInputFormatted = formatTheList(numberAndBinaryInput);
            //ArrayList<Integer> numberInputFormatted = numberAndBinaryInput.toString().split(",");
            pairNumbersWithBinary(unsortedList);
            ifNotEmptyCompareAndSortLoop(numberAndBinaryOutput);
            excludeBinariesAndSetOutput(numberAndBinaryOutput, numberAndBinaryOutput);
        }
        return numberOutput;
    }

    private ArrayList<Integer> pairNumbersWithBinary(ArrayList<Integer> numberOutput) {
        ArrayList<Integer> unsortedList = new ArrayList<>();
        Arrays.stream(new ArrayList[]{unsortedList}).forEach(numberInputFormattedAndSeparated -> {
            NumberAndBinary numberAndBinary = new NumberAndBinary();
            numberAndBinary.setNumber(Integer.parseInt(numberInputFormattedAndSeparated));
            numberAndBinary.setBinaryOfNumber();
            numbersWithBinary.add(numberAndBinary);
        });
        return numbersWithBinary;
    }

    private ArrayList<Integer> ifNotEmptyCompareAndSortLoop(ArrayList<Integer> numbersWithBinary){
        NumberAndBinary numberAndBinary = new NumberAndBinary();
        numberSorted = numberAndBinary.compareTo(numbersWithBinary);
    }

    private ArrayList<Integer> excludeBinariesAndSetOutput(NumberAndBinaryOutput numberAndBinaryOutput, ArrayList<Integer> numbersWithBinary){
        ArrayList<Integer> sortedNumbers = SortByBinaryService.extractTheNumbers(numbersWithBinary);
        numberAndBinaryOutput.setSortedList(sortedNumbers);
    }

    private static ArrayList<Integer> extractTheNumbers(ArrayList<Integer> sortedNumbersWithBinary){
        ArrayList<Integer> sortedNumbersWithoutBinary = new ArrayList<Integer>();
        for (int i = 0; i < sortedNumbersWithBinary.size(); i++) {
            NumberAndBinary numberAndBinary = sortedNumbersWithBinary.get(i);
            sortedNumbersWithoutBinary.add(numberAndBinary.getNumber());
        }
        return sortedNumbersWithoutBinary;
    }
}