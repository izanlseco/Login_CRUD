package com.igz.talenttest.Input;

import java.util.ArrayList;
import java.util.Objects;

public class NumberAndBinaryInput {

    private ArrayList<Integer> unsortedList;

    public ArrayList<Integer> getUnsortedList() {
        return unsortedList;
    }

    public void setUnsortedList(ArrayList<Integer> unsortedList) {
        this.unsortedList = unsortedList;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        NumberAndBinaryInput that = (NumberAndBinaryInput) o;
        return unsortedList.equals(that.unsortedList);
    }

    @Override
    public int hashCode() {
        return Objects.hash(unsortedList);
    }

    @Override
    public String toString() {
        return "NumberAndBinaryInput{" +
                "unsortedList=" + unsortedList +
                '}';
    }
}
