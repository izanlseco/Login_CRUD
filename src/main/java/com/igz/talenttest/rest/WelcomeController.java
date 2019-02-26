package com.igz.talenttest.rest;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

/**
 * @author IGZ
 */
@RestController
public class WelcomeController {

    @RequestMapping("/welcome")
    public String welcome() {
        return "Welcome to Intelygenz talent test.";
    }
}