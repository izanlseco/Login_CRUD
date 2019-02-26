package com.igz.talenttest.model;

import java.util.Comparator;
import java.util.Objects;

import static java.lang.Integer.*;
import static org.springframework.util.StringUtils.countOccurrencesOf;

public class NumberAndBinary implements Comparable<NumberAndBinary> {

    private Integer number;
    private Integer binaryOfNumber;

    public NumberAndBinary() {
    }

    public NumberAndBinary(Integer number) {
        this.number = number;
        this.binaryOfNumber = numberOfBinariesInACertainNumber();
    }

    public Integer getNumber() {
        return number;
    }

    public void setNumber(Integer number) {
        this.number = number;
    }

    public Integer getBinaryOfNumber() {
        return binaryOfNumber;
    }

    public void setBinaryOfNumber() {
        this.binaryOfNumber = numberOfBinariesInACertainNumber();
    }

    private int numberOfBinariesInACertainNumber() {
        return countOccurrencesOf(toBinaryString(this.number),"1");
    }

    @Override
    public int compareTo(NumberAndBinary numberAndBinary) {
        return Comparator.comparing((NumberAndBinary numberAndBinary1) -> numberAndBinary1.getBinaryOfNumber()).reversed()
                .thenComparing((NumberAndBinary numberAndBinary2) -> numberAndBinary2.getNumber()).compare(this, numberAndBinary);
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        NumberAndBinary numberAndBinary1 = (NumberAndBinary) o;
        return number.equals(numberAndBinary1.number) &&
                binaryOfNumber.equals(numberAndBinary1.binaryOfNumber);
    }

    @Override
    public int hashCode() {
        return Objects.hash(number, binaryOfNumber);
    }

    @Override
    public String toString() {
        return "NumberAndBinary{" +
                "number=" + number +
                ", binaryOfNumber=" + binaryOfNumber +
                '}';
    }
}