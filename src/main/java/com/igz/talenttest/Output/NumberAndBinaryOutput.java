package com.igz.talenttest.Output;

import java.util.ArrayList;
import java.util.Objects;

public class NumberAndBinaryOutput {

    private ArrayList<Integer> sortedList;

    public NumberAndBinaryOutput() {
        sortedList = new ArrayList<Integer>();
    }

    public ArrayList<Integer> getSortedList() {
        return sortedList;
    }

    public void setSortedList(ArrayList<Integer> sortedList) {
        this.sortedList = sortedList;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        NumberAndBinaryOutput that = (NumberAndBinaryOutput) o;
        return sortedList.equals(that.sortedList);
    }

    @Override
    public int hashCode() {
        return Objects.hash(sortedList);
    }

    @Override
    public String toString() {
        return "NumberAndBinaryOutput{" +
                "sortedList=" + sortedList +
                '}';
    }
}