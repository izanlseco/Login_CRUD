package com.igz.talenttest.rest;

import com.igz.talenttest.Input.NumberAndBinaryInput;
import com.igz.talenttest.Output.NumberAndBinaryOutput;
import com.igz.talenttest.service.SortByBinaryService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.web.bind.annotation.*;


@RestController
public class SortByBinaryController {
    @Autowired SortByBinaryService sortByBinaryService;
    @RequestMapping(value = "/auto-sort/", method = RequestMethod.POST, produces = MediaType.APPLICATION_JSON_VALUE)
    public NumberAndBinaryOutput numberOutput(@RequestBody NumberAndBinaryInput numberAndBinaryInput) {
        NumberAndBinaryOutput numberAndBinaryOutput = new NumberAndBinaryOutput();
        try {
            numberAndBinaryOutput = sortByBinaryService.sortByBinary(numberAndBinaryInput);
        } catch (NumberFormatException e) {
            System.out.println("The following error was given: " + e);
        } finally {
            System.out.println("There was some uncontrolled error, please contact with the administrator");
        }
        return numberAndBinaryOutput;
    }
}